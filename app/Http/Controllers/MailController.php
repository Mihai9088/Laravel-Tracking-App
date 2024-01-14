<?php

namespace App\Http\Controllers;

use App\Mail\Register;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail(Request $request)
    {
        $userName = Auth::user()->name;
        $email = Auth::user()->email;


        Mail::to('tracker@yahoo.com')->send(new Register($email, $userName));

        return view('verification.register', compact('email', 'userName',));
    }
}
