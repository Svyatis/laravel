<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class HomeController extends Controller
{
    public function index()
    {
        return view('test.mainpage');
    }
    public function aboutUs()
    {
        return view('test.aboutUs');
    }
    public function upload()
    {
        return view('test.upload');
    }
    public function blog()
    {
        return view('test.blog');
    }
    /* public function contactUs()
    {
        return view('test.contactUs');
    } */
    public function create()
    {
        return view('test.contactUs');
    }

    public function store()
    {
    }
}
