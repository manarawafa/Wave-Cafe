<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Conn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ConnController extends Controller
{
    public function sendmail()
    {
        $msg = Conn::find(1);
        Mail::to('admin@gmail.com')->send(new ContactMail($msg));
        return "email  sent";
    }
    //
}
