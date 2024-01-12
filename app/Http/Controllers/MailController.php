<?php

namespace App\Http\Controllers;

use App\Mail\Register;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail()
    {
        Mail::to('Cf4y0@example.com')->send(new Register());
        return view('verification.register');
    }
}
