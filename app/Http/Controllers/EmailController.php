<?php

namespace App\Http\Controllers;

use App\Mail\UserMail;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    //
    public function emailUser()
    {
        return new UserMail();
    }
}
