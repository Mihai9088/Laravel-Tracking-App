<?php

namespace App\Http\Controllers;

use App\Mail\Register;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail(Request $request)
    {
        Mail::to('tracker@yahoo.com')->send(new Register());
        return view('verification.register');
    }
}
