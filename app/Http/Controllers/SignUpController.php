<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignUpController extends Controller
{
    public function SignUpForm(){
        return view("user.sign-up");
    }
 /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSignUpRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function SigUp(){

    }
}
