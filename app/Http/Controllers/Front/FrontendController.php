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
        $datalist = Category::with('products')->take(4)->get();
        $datalistafter = Category::with('products')
            ->skip(4)
            ->take(PHP_INT_MAX)
            ->get();
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
}
