<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function wishlistview()
    {
        $userId = '22'; // Auth::id();
        $wishlists = Wishlist::where('user_id', $userId)->with('product')->get();

        return view('website.wishlist', compact('wishlists'));
    }

    public function addToWishlist(Request $request)
    {
        $userId = '1'; // Auth::id();

        $ProductId = $request->product_id;

        $productExists = Wishlist::where('user_id', 22)->where('product_id', $ProductId)->count();

        if ($productExists > 0) {
            return response()->json(['success' => false, 'message' => 'Product already in wishlist.']);
        }

        $wishlist = new Wishlist();
        $wishlist->user_id = 22;//auth()->id()
        $wishlist->product_id = $ProductId;
        $wishlist->save();

        return response()->json(['success' => true, 'message' => 'Product added to wishlist successfully']);
    }


    public function remove($id)
    {
        $userId = '22'; // Auth::id();
        $wishlist = Wishlist::where('id', $id)->where('user_id', 22)->first();

        if ($wishlist) {
            $wishlist->delete();
        }

        return redirect()->route('wishlist.view')->with('success', 'Product removed from wishlist');
    }
}
