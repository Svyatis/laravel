<?php

namespace App\Http\Controllers;

use App\Http\Requests;

class ViewController extends Controller
{
    /**
     * Function rendered page
     *
     * @return mainpage view
     */
    public function index()
    {
        return view('View.mainpage');
    }

    /**
     * Function rendered page
     *
     * @return aboutUs view
     */
    public function aboutUs()
    {
        return view('View.aboutUs');
    }

    /**
     * Function rendered page
     *
     * @return blog view
     */
    public function blog()
    {
        return view('View.blog');
    }
}