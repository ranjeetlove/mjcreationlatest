<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{

    public function index(Request $request)
	{

        $sliders = DB::table('sliders')->get();
        $banner = DB::table('banners')->where('type','=','TopSmall')->get();
        $ps = DB::table('pagesettings')->find(1);
        $feature_products =  Product::where('featured','=',1)->where('status','=',1)->orderBy('id','desc')->take(8)->get();
        $datalist = Category::with('products')->take(4)->get()->filter(function ($category) {
            return $category->products->count() > 0;
        });
        $datalistafter = Category::with('products')->get()->filter(function ($category) {
            return $category->products->count() > 0;
        })->skip(4)->take(PHP_INT_MAX);
            $mostViewedProducts = Product::orderBy('id', 'desc')
            ->take(4)
            ->get();
	    return view('website.home',compact('ps','sliders','banner','feature_products','datalist','datalistafter','mostViewedProducts'));
	}

    public function homedetail($id) 
    {

        $product = Product::findOrFail($id);
        $relatedproducts = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->take(6)->get();
        return view('website.product-detail', compact('product', 'relatedproducts'));
    }

    public function productlist($id)
    {
        $category = Category::find($id);
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
        $category = Category::where('id', $categoryId)
            ->with(['products' => function ($query) use ($sortBy) {
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

	public function faq()
	{

		return view('front.faq');
	}
	public function profile()
	{

		return view('front.profile');
	}

    public function contact()
	{

		return view('front.contact');
	}

    public function checkout()
	{

		return view('front.checkout');
	}

    public function orders()
	{

		return view('front.orders');
	}
    public function ordersDetail()
	{

		return view('front.order-details'); 
	}
    public function vendorRegistration()
	{

		return view('front.vendor-registration');
	}

    public function myAccount()
	{

		return view('front.my-account');
	}

}
