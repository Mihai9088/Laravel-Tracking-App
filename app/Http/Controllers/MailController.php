<?php

namespace App\Http\Controllers;

use App\Mail\Register;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class MailController extends Controller
{
    public function sendMail(Request $request)
    {

        $user = Auth::user();


        if ($user && filter_var($user->email, FILTER_VALIDATE_EMAIL)) {
            $userName = $user->name;
            $email = $user->email;
            $plainPassword = Session::get('plainPassword');


            Mail::to($email)->send(new Register($email, $userName, $plainPassword));

            return view('verification.register', compact('email', 'userName', 'plainPassword'));
        } else {

            return redirect()->back()->withErrors(['email' => 'Invalid or missing email address']);
        }
    }
}
