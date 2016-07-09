<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AboutController extends Controller
{
    public function create()
    {
        return view('test.contactUs');
    }

    public function store()
    {
        return view('test.submit');
    }

}
