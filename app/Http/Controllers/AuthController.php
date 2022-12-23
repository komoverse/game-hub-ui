<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\AuthModel;
use Hash;
use Session;

class AuthController extends Controller
{
    function showAdminLoginPage() {
        return view('admin.login');
    }

    function loginAdmin(Request $req) {
        Validator::make($req->all(), [
            'username' => 'required|max:100',
            'password' => 'required|max:255',
        ])->validate();

        $admindata = AuthModel::checkLogin($req);
        if ($admindata) {
            if (Hash::check($req->password, $admindata->password)) {
                Session::put('admindata', $admindata);
                return redirect('admin/dashboard');
            } else {
                $errors = [
                    'password' => 'Wrong Password',
                ];
                return redirect('admin/login')->withErrors($errors);
            }
        } else {
            $errors = [
                'password' => 'Account Not Found',
            ];
            return redirect('admin/login')->withErrors($errors);
        }
    }
}
