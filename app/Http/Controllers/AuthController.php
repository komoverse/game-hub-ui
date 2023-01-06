<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\AuthModel;
use Laravel\Socialite\Facades\Socialite;
use Hash;
use Session;
use App\Http\Controllers\APIController;

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

    function loginKOMO(Request $req) {
        Validator::make($req->all(), [
            'komo_username' => 'required|string',
            'password' => 'required',
        ])->validate();

        Session::put('referer', url()->current());
        $api_data = [
            'komo_username' => $req->komo_username,
            'password' => $req->password,
        ];
        $response = (new APIController)->komoAPI_V1('POST', '/v1/web-login', $api_data);
        if ($response->status == 'success') {
            Session::put('userdata', $response->userdata);
            return redirect(Session::get('referer'))->with('status', 'Logged In');
        } else {
            return redirect(Session::get('referer'))->with('error', $response->messages);
        }
    }

    function logout() {
        Session::put('referer', url()->previous());
        Session::forget('userdata');
        return redirect(Session::get('referer'))->with('status', 'Logged Out');
    }

    function redirectToGoogle() {
        Session::put('referer', url()->previous());
        return Socialite::driver('google')->redirect();
    }

    function handleGoogleCallback() {
        $sso_response = Socialite::driver('google')->user();
        $api_data = [
            'email' => $sso_response->email,
        ];
        $response = (new APIController)->komoAPI_V1('POST', '/v1/account-info/email', $api_data);
        if (isset($response->id)) {
            Session::put('userdata', $response);
            return redirect(Session::get('referer'))->with('status', 'Logged In');
        } else {
            return redirect(Session::get('referer'))->with('error', $response->messages);
        }
    }

    function redirectToFacebook() {
        return Socialite::driver('facebook')->redirect();
    }

    function handleFacebookCallback() {
        $sso_response = Socialite::driver('facebook')->user();
        $api_data = [
            'email' => $sso_response->email,
        ];
        $response = (new APIController)->komoAPI_V1('POST', '/v1/account-info/email', $api_data);
        if (isset($response->id)) {
            Session::put('userdata', $response);
            return redirect(Session::get('referer'))->with('status', 'Logged In');
        } else {
            return redirect(Session::get('referer'))->with('error', $response->messages);
        }
    }

    // function redirectToTwitter() {
    //     return Socialite::driver('twitter')->redirect();
    // }

    // function handleTwitterCallback() {
    //     $sso_response = Socialite::driver('twitter')->user();
    //     dd($sso_response);
    //     $response = $this->komoAPIV2('POST', '/v2/sso/login', $sso_response);
    //     if ($response->status == 'success') {
    //         Session::put('userdata', $response->userdata);
    //         return redirect('/');
    //     } else {
    //         if ($response->message == 'KOMO Account Not Found') {
    //             return redirect('register')->with('sso_data', $response->sso_data);
    //         }
    //         return redirect('login')->with('error', $response->message);
    //     }
    // }

    function phantomWallet(Request $req) {
        $referer = url()->previous();
        $api_data = [
            'wallet_pubkey' => $req->wallet_pubkey,
        ];
        $response = (new APIController)->komoAPI_V1('POST', '/v1/account-info/wallet', $api_data);
        if ($response->komo_username) {
            Session::put('userdata', $response);
            if ($response->wallet_pubkey || $response->semi_custodial_wallet_pubkey) {
                return redirect($referer)->with('success', 'Login Success');
            }
        } else {
            return redirect('register')->with('wallet_pubkey', $req->wallet_pubkey);
        }
    }

    function showRegistrationForm() {
        Session::forget('userdata');
        return view('user.register');
    }

    function submitRegistration(Request $req) {
        Validator::make($req->all(), [
            'komo_username' => 'required|regex:/^(?=.{6,30}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/',
            'password' => 'required|min:6',
            'country_code' => 'required|string|size:3',
            'wallet_pubkey' => 'nullable|string|min:30|max:50',
            'email' => 'required|email',
            'game_newsletter_subscribe' => 'nullable|boolean',
        ])->validate();


        $response = (new APIController)->komoAPI_V1('POST', '/v1/register', $req->all());
        if ($response->status == 'error') {
            return redirect()->back()->withErrors($response->message);
        } else {
            return redirect('/')->with('success', 'Registration Success');
        }
    }
}
