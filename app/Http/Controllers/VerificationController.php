<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function notice(){
        return "Mohon untuk melakukan verifikasi email terlebih dahulu";
    }

    public function verify(EmailVerificationRequest $request){
        $request->fulfill();

        // Trigger the Verified event
        event(new Verified($request->user()));

        // Redirect to the dashboard route
        return redirect()->route('home')->with('verified', true);
    }
}
