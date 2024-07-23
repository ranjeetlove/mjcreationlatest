<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Wishlist;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class NarendraController extends Controller
{


    public function userProfile()
    {

        return view('website.userProfile');
    }



}
