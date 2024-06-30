<?php

namespace App\Http\Controllers\User\Auth;

use App\Models\User;
use App\Models\Discount;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Models\VendorProduct;
use App\Models\Productcategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use App\Events\Sendemailvarificationotp;
use App\Events\Sendphonevarificationotp;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function usersloginview()
    {
        return view('website.users.registration');
    }

    public function usersauthlogin(Request $request)
    {

        $this->mergerequestoremailorphone_no($request);

        $validator = Validator::make($request->all(), [
            'password' => ['required', 'string', 'min:8'],
            'user_contact' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errormessage' => $validator->errors()
            ], 422);
        }

        $userData = User::where('email', $request->user_contact)
            ->orWhere('phone_no', $request->user_contact)
            ->first();

        if (!$userData) {
            return response()->json(['errormessage' => 'You are not an authorized person'], 401);
        }
        // Check the password against the stored hash
        if (!Hash::check($request->password, $userData->password)) {
            return response()->json(['errormessage' => 'The provided password is incorrect.'], 401);
        }
        if ($userData->is_verified != '1') {
            return response()->json(['errormessage' => 'Your account is not verified. OTP has been sent to your registered email.'], 401);
        }

        //$userData = User::where('email', $request->user_contact)->orWhere('phone_no', $request->user_contact)->first();
        // if($userData->is_verified=='0'){
        //     if(isset($request->email)){
        //         $otp = rand(100000,999999);
        //         event(new Sendemailvarificationotp($otp,$userData));

        //     }

        //     if(isset($request->phone_no)){
        //         $otp = rand(100000,999999);
        //         event(new Sendphonevarificationotp($otp,$userData));

        //     }

        // }

        if ($validator->fails()) {
            $responsehtml = view::make('website.users.otpvarification', ['user_contact' => $request->user_contact, 'user_id' => $userData->id])->render();
            return response()->json(['errormessage' => $validator->errors(), 'responsehtml' => $responsehtml], 422);
        }


        if (Auth::attempt(['email' => $request->user_contact, 'password' => $request->password]) || Auth::attempt(['phone_no' => $request->user_contact, 'password' => $request->password])) {
            // Authentication successful
            $user = Auth::user();

            return redirect()->route('users-home-view');
        } else {

            return response()->json(['errormessage' => 'Your are not authorized person'], 401);
        }

        // Continue with your logic if validation passes


        // if ($validator->fails()) {
        //     return response()->json([
        //         'sucess'=>true,
        //         'errormessage'=>$validator->errors(),
        //     ],422);
        // }

    }

    private function mergerequestoremailorphone_no(Request $request)
    {
        // Define this function to merge email or phone number into user_contact
        if ($request->has('email')) {
            $request->merge(['user_contact' => $request->email]);
        } elseif ($request->has('phone_no')) {
            $request->merge(['user_contact' => $request->phone_no]);
        }
    }

    public function homeview()
    {

        $datalist = ProductCategory::with('vendorProducts')->take(4)->get();

        $datalistafter = ProductCategory::with('vendorProducts')
            ->orderBy('created_at', 'desc')
            ->skip(4)
            ->take(PHP_INT_MAX)
            ->get();
        // Get the top 10 most viewed products
        $mostViewedProducts = VendorProduct::orderBy('id', 'desc')->take(10)->get();
        // Get all banner data
        $banner = Discount::take(4)->get();

        return view('website.home', compact('datalist', 'datalistafter', 'mostViewedProducts', 'banner'));
    }

    public function homedetail($id)
    {

        $product = VendorProduct::findOrFail($id);
        $relatedproducts = VendorProduct::where('product_category_id', $product->product_category_id)->where('id', '!=', $product->id)->take(6)->get();
        return view('website.product-detail', compact('product', 'relatedproducts'));
    }

    public function addToCart(Request $request)
    {
        $productId = $request->id;
        $product = VendorProduct::find($productId);

        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Product not found.']);
        }

        $cart = session()->get('cart', []);

        // Check if product already in cart
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                "id" => $product->id,
                "name" => $product->product_title,
                "quantity" => 1,
                "price" => $product->product_measurment_quantity_price,
                "image" => $product->product_banner_image
            ];
        }

        session()->put('cart', $cart);

        $cartCount = count($cart);

        return response()->json(['success' => true, 'message' => 'Product added to cart successfully!', 'cartCount' => $cartCount]);
    }

    public function updateCart(Request $request)
    {
        $productId = $request->product_id;
        $quantity = $request->quantity;

        $cart = session()->get('cart', []);

        // Update the quantity for the specified product
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $quantity;
            session()->put('cart', $cart);

            // Recalculate totals if needed (similar to your cartview method)
            $totalPrice = 0;
            $totalDiscount = 0;
            $deliveryCharges = 0;

            foreach ($cart as $item) {
                $totalPrice += $item['price'] * $item['quantity'];
                $totalDiscount += ($item['price'] * $item['quantity']) * 0.02;
            }

            if ($totalPrice > 100) {
                $deliveryCharges = 0;
            } else {
                $deliveryCharges = 40;
            }

            $totalAmount = $totalPrice - $totalDiscount + $deliveryCharges;

            return response()->json([
                'success' => true,
                'message' => 'Cart updated successfully!',
                'totalPrice' => $totalPrice,
                'totalDiscount' => $totalDiscount,
                'deliveryCharges' => $deliveryCharges,
                'totalAmount' => $totalAmount
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Product not found in cart.']);
    }


    public function cartview()
    {
        $cart = session()->get('cart', []);
        $totalPrice = 0;
        $totalDiscount = 0;
        $deliveryCharges = 0;

        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];

            $totalDiscount += ($item['price'] * $item['quantity']) * 0.02;
        }

        if ($totalPrice > 100) {
            $deliveryCharges = 0;
        } else {
            $deliveryCharges = 40;
        }

        $totalAmount = $totalPrice - $totalDiscount + $deliveryCharges;

        return view('website.cart', compact('cart', 'totalPrice', 'totalDiscount', 'deliveryCharges', 'totalAmount'));
    }


    public function cartRemove(Request $request)
    {

        $productId = $request->input('product_id');

        if ($productId) {
            $cart = session()->get('cart');

            if (isset($cart[$productId])) {
                unset($cart[$productId]);
                session()->put('cart', $cart);
                return redirect()->back()->with('success', 'Item removed from cart successfully.');
            } else {
                return redirect()->back()->with('error', 'Item not found in cart.');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid request.');
        }
    }




    public function wishlistview()
    {
        $userId = Auth::id();
        $wishlists = Wishlist::where('user_id', $userId)->with('vendorProduct')->get();


        return view('website.wishlist', compact('wishlists'));
    }

    public function addToWishlist(Request $request)
    {
        $userId = Auth::id();

        $vendorProductId = $request->vendor_product_id;

        $productExists = Wishlist::where('user_id', $userId)->where('vendor_product_id', $vendorProductId)->count();

        if ($productExists > 0) {
            return response()->json(['success' => false, 'message' => 'Product already in wishlist.']);
        }

        $wishlist = new Wishlist();
        $wishlist->user_id = auth()->id();
        $wishlist->vendor_product_id = $vendorProductId;
        $wishlist->save();

        return response()->json(['success' => true, 'message' => 'Product added to wishlist successfully']);
    }


    public function remove($id)
    {
        $userId = Auth::id();
        $wishlist = Wishlist::where('id', $id)->where('user_id', $userId)->first();

        if ($wishlist) {
            $wishlist->delete();
        }

        return redirect()->route('website.wishlist')->with('success', 'Product removed from wishlist');
    }

    public function productlist($id)
    {
        $category = ProductCategory::find($id);
        $catId = $id;

        if (!$category) {
            abort(404);
        }


        return view('website.shop', compact('category'));
    }


    public function sort(Request $request)
    {

        $sortBy = $request->input('sort_by');
        $categoryId = $request->input('category_id');
        $category = ProductCategory::where('id', $categoryId)
            ->with(['vendorProducts' => function ($query) use ($sortBy) {
                $this->applySorting($query, $sortBy);
            }])
            ->first();
        return view('website.response', compact('category'))->render();
    }

    private function applySorting($query, $sortBy)
    {
        switch ($sortBy) {
            case 'lowToHigh':
                $query->orderBy('product_measurment_quantity_price', 'asc');
                break;
            case 'highToLow':
                $query->orderBy('product_measurment_quantity_price', 'desc');
                break;
            case 'rating':
                $query->orderBy('rating', 'desc');
                break;
            case 'latest':
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/users/home');
    }

    public function saveForLater(Request $request)
{
    $productId = $request->product_id;
    $cart = session()->get('cart', []);
    $savedForLater = session()->get('saved_for_later', []);

    if (isset($cart[$productId])) {
        $savedForLater[$productId] = $cart[$productId];
        unset($cart[$productId]);

        session()->put('cart', $cart);
        session()->put('saved_for_later', $savedForLater);

        return response()->json(['success' => true, 'message' => 'Product saved for later successfully!']);
    }

    return response()->json(['success' => false, 'message' => 'Product not found in cart.']);
}

}
