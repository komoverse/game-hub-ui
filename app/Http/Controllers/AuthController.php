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

        $admindata = AuthModel::getAdmin($req->username);
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
                'username' => 'Account Not Found',
            ];
            return redirect('admin/login')->withErrors($errors);
        }
    }

    function showAdminChangePassword() {
        return view('admin/change-password');
    }

    function submitAdminChangePassword(Request $req) {
        Validator::make($req->all(), [
            'old_password' => 'required|max:255',
            'new_password' => 'required|min:8|max:255',
            'confirm_password' => 'required|min:8|max:255',
        ])->validate();

        if ($req->confirm_password != $req->new_password) {
            $errors = [
                'password' => 'New Password Did Not Match Confirm Password',
            ];
            return redirect()->back()->withErrors($errors);
        }

        $admindata = AuthModel::getAdmin(Session::get('admindata')->username);
        if ($admindata) {
            if (Hash::check($req->old_password, $admindata->password)) {
                if (AuthModel::changeAdminPassword($req)) {
                    $success = [
                        'status' => 'Change Password Success. Please Login Again.',
                    ];
                    return redirect('admin/logout');
                }
            } else {
                $errors = [
                    'password' => 'Wrong Old Password',
                ];
                return redirect()->back()->withErrors($errors);
            }
        }
    }

    function logoutAdmin() {
        Session::flush();
        return redirect('admin/login');
    }
}
