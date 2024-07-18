<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Currency;
use App\Models\Coupon;
use App\Models\Generalsetting;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    public function addToCart(Request $request)
    {
        $productId = $request->id;
        $product = Product::find($productId);

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
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->photo
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

        //test

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
