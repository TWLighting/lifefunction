<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class UserAuthController extends Controller
{
    public function signUpPage(){
        $binding=['title'=>'註冊'];

        return view('auth.signUp',$binding);
    }

    public function signUpProcess(Request $request){
        $input=\request()->all();
        $vaildata=$request->validate([
            'email' => 'required|email|max:255',
        ]);

//        if($vaildata->fails()){
//            //
//            return redirect('user/auth/sign-up')
//                ->withErrors($vaildata)
//                ->withInput();
//        }



    }

    public function signInPage(){

    }

    public function signInProcess(){

    }

    public function signOut(){

    }
}
