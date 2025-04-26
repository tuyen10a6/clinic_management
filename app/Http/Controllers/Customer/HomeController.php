<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;

class HomeController
{
    public function index()
    {
        return view('pages/customer/home');
    }
}
