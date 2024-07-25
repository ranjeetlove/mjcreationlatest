<?php

namespace App\Http\Controllers\Front\User\Auth;

use App\Models\User;
use App\Models\Discount;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Models\VendorProduct;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use App\Events\Sendemailvarificationotp;
use App\Events\Sendphonevarificationotp;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\ProductPriceDetail;
use App\Models\Product;

class UserLoginController extends Controller
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

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/users/home');
    }



}
