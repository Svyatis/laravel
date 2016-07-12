<?php

namespace App\Http\Controllers;

use Validator;
use Redirect;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\ContactFormRequest;

class HomeWorkController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    
    /**
     * Function rendered page
     *
     * @return mainpage view
     */
    public function mainpage()
    {
        return view('HomeWork.mainpage');
    }

    /**
     * Function rendered page
     *
     * @return aboutUs view
     */
    public function aboutUs()
    {
        return view('HomeWork.aboutUs');
    }

    /**
     * Function rendered page
     *
     * @return blog view
     */
    public function blog()
    {
        return view('HomeWork.blog');
    }
    
    /**
     * Function rendered ContactUs form
     *
     * @return ContactUs view
     */
    public function create()
    {
        return view('HomeWork.contactUs');
    }

    /**
     * Function stored users information
     *
     * @return Sending users data and inform the user of a successful form submission
     */
    public function store(ContactFormRequest $request)
    {
        \Mail::send('HomeWork.email',
            [
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'user_message' => $request->get('message')
            ], function($message)
            {
                $message->from('admin@svyatis.com');
                $message->to('svyat.php@gmail.com', 'Admin')->subject('Feedback');
            });

        return \Redirect::route('contact')->with('message', 'Your message was successfully submit! Thanks for contacting us!');
    }

    /**
     * Valodation and uploading files
     *
     * @return void
     */
    public function upload()
    {

        // getting all of the post data
        $file = ['image' => Input::file('image')];

        // setting up rules
        $rules = ['image' => 'required',]; //mimes:jpeg,bmp,png and for max size max:10000

        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($file, $rules);

        if ($validator->fails())
        {
            // send back to the page with the input data and errors
            return Redirect::to('upload')->withInput()->withErrors($validator);
        } else {
            // checking file is valid.
            if (Input::file('image')->isValid())
            {
                $destinationPath = env('UPLOAD_PATH'); // upload path
                $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111,99999).'.'.$extension; // renameing image
                Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message
                Session::flash('success', "Your file is : $destinationPath/$fileName");
                return Redirect::to('upload');
            } else
            {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');
                return Redirect::to('upload');
            }
        }
    }
}
