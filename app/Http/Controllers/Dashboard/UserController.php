<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\Datatables;

class UserController extends Controller
{
    public function userdetails(Request $request)
    {


        if ($request->ajax()) {

            $users = User::query()
                ->select('users.*', \DB::raw("DATE_FORMAT(users.created_at ,'%d/%m/%Y') AS created_date"))
                ->orderBy('users.created_at', 'desc');
            return Datatables::of($users)
                ->addIndexColumn()
                // ->addColumn('vendor_profile_image', function ($row) {
                //     if (isset($row->vendor_image)) {
                //         $url = asset("vendor_image/{$row->vendor_image}");
                //     } else {
                //         $url = asset("vendor_image/vendor_vector.jpeg");
                //     }

                //     $vendorimg = "<img src={$url} width='30'  height='50' />";

                //     return $vendorimg;
                // })

                ->addColumn('is_verified', function ($row) {

                    $status_text = $row->is_verified == 1 ? 'Active' : 'Inactive';

                    $status_btn = $row->is_verified == 1 ? 'btn btn-success' : 'btn btn-danger';

                    $user_status = "<button type='button' id='statuschange$row->id' onclick='changeStatus($row->id)'
                    class='$status_btn ml-2'>$status_text</button>";

                    return $user_status;
                })

                // ->addColumn('url', function ($row) {
                //     if (isset($row->vendor_image)) {
                //         $url = asset("vendor_image/{$row->vendor_image}");
                //     } else {
                //         $url = asset("vendor_image/vendor_vector.jpeg");
                //     }

                //     return $url;

                // })

                 ->rawColumns(['name', 'email', 'phone_no','is_verified'])
                ->make(true);


        }
    }


    public function userlist()
    {
        return view('managedashboard.users.index');
    }


    public function statusupdate(Request $request)
    {

        $user = User::find($request->user_id);
        $user->status = $request->status;

        $user->save();

        return response()->json([
            'id' => $user->id,
            'status' => $user->status,

        ], 200);


    }







}
