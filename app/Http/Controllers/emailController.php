<?php

namespace App\Http\Controllers;

use App\Mail\MailToBrian;
use Illuminate\Http\Request;

class emailController extends Controller
{
    public function MailBrian()
    {
        \Mail::to('brianadi1230@gmail.com')->send(new MailToBrian(["message" => "Ini adalah isi emailnya"]));
    }
}
