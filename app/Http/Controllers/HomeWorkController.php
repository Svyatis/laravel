<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\ContactFormRequest;
use Illuminate\Support\Facades\View;

class HomeWorkController extends Controller
{

    /**
     * @var PostRepository
     */
    private $postRepo;

    /**
     * HomeWorkController constructor.
     * @param PostRepository $postRepo
     */
    public function __construct(PostRepository $postRepo)
    {
        $this->middleware('auth');
        $this->postRepo = $postRepo;
    }

    /**
     * @return mixed
     */
    public function setLocale()
    {
        Session::set('locale', Input::get('locale'));
        return Redirect::back();
    }

    /**
     * @return View
     */
    public function mainpage()
    {
        return view('HomeWork.mainpage');
    }

    /**
     * @return View
     */
    public function aboutUs()
    {
        return view('HomeWork.aboutUs');
    }

    /**
     * @return View
     */
    public function create()
    {
        return view('HomeWork.contactUs');
    }

    /**
     * @param ContactFormRequest $request
     * @return mixed
     */
    public function store(ContactFormRequest $request)
    {
        Mail::send(
            'HomeWork.email',
            [
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'user_message' => $request->get('message')
            ],
            function($message) {
                $message->from('admin@svyatis.com');
                $message->to('svyat.php@gmail.com', 'Admin')->subject('Feedback');
            }
        );
        return Redirect::route('contact')->with(
            'message',
            "Your message was successfully submit! Thanks for contacting us!"
        );
    }

    /**
     * @return View
     */
    public function uploadMake()
    {
        return view('HomeWork.upload');
    }

    /**
     * @return mixed
     */
    public function getBlog()
    {
        $posts = $this->postRepo->author();
        return View::make('HomeWork.addpost')->with('posts', $posts);
    }

    /**
     * @param Requests\PostDatabase $request
     * @return mixed
     */
    public function postAdd(Requests\PostDatabase $request)
    {
        $this->postRepo->create([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'author_id' => Auth::user()->id
        ]);
        return Redirect::route('blog');
    }

    /**
     * @param $postId
     * @return mixed
     */
    public function postDelete($postId)
    {
        $this->postRepo->delete($postId);
        return Redirect::route('blog');
    }

    /**
     * @return mixed
     */
    public function upload()
    {
        // getting all of the post data
        $file = ['image' => Input::file('image')];

        // setting up rules
        $rules = ['image' => 'required',]; //mimes:jpeg,bmp,png and for max size max:10000

        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($file, $rules);

        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::to('upload')->withInput()->withErrors($validator);
        } else {
            // checking file is valid.
            if (Input::file('image')->isValid()) {
                $destinationPath = env('UPLOAD_PATH'); // upload path
                $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111, 99999).'.'.$extension; // renaming image
                Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message
                Session::flash('success', "Your file is : $destinationPath/$fileName");
                return Redirect::to('upload');
            } else {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');
                return Redirect::to('upload');
            }
        }
    }
}
