<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostDatabase;
use App\Http\Requests\UploadRequest;
use App\Repositories\PostRepository;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Redirect;
use Session;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\ContactFormRequest;
use View;

class HomeWorkController extends Controller
{

    /**
     * @var PostRepository
     */
    private $postRepo;
    private $productRepo;

    /**
     * HomeWorkController constructor.
     * @param PostRepository $postRepo
     */
    public function __construct(PostRepository $postRepo, ProductRepository $productRepo)
    {
        $this->middleware('auth');
        $this->postRepo = $postRepo;
        $this->productRepo = $productRepo;
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
     * @return mixed
     */
    public function getAllProducts()
    {
        $products = $this->productRepo->getAll();
        return view('HomeWork.upload')->with('products', $products);
    }

    public function getProductDetail($id)
    {
        $productDetail = $this->productRepo->getDetails($id);
        return view('HomeWork.upload')->with('productDetail', $productDetail);
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
        return Redirect::route('contact')->with('message', "Thanks for contacting us!");
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
        return view('HomeWork.addpost')->with('posts', $posts);
    }

    /**
     * @param PostDatabase $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postAdd(PostDatabase $request)
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
     * @param UploadRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function upload(UploadRequest $request)
    {
            $files = $request->file('image');
            $destinationPath = env('UPLOAD_PATH');
            $extension = $files->getClientOriginalExtension();
            $fileName = Auth::user()->name . rand(11111, 99999).'.'.$extension;
            $files->move($destinationPath, $fileName);
            $image = $destinationPath . "/" . $fileName;
            Session::flash('success', "Your file is : $image");
            $this->productRepo->create([
                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'image' => $image]);

            return Redirect::route('upload');
    }
}
