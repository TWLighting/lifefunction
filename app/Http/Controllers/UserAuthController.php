<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class UserAuthController extends Controller
{
    public function signUpPage()
    {
        $binding = ['title' => '註冊'];

        return view('auth.signUp', $binding);
    }

    public function signUpProcess(Request $request)
    {
        $input = \request()->all();
        $vaildata = $request->validate([
            'email' => 'required|email|max:255',
        ]);

        if ($vaildata->fails()) {
            //
            return redirect('user/auth/sign-up')
                ->withErrors($vaildata)
                ->withInput();
        }
    }

    public function signInPage()
    {
        $data = DB::table('userinfo')->select()->first();
        var_dump($data->username);
    }

    public function signInProcess()
    { }

    public function signOut()
    { }
}
