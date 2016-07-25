<?php

namespace App\Http\Controllers;

use App\Services\MailService;
use View;
use Cache;
use Redirect;
use Session;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UploadRequest;
use App\Repositories\PostRepository;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Input;

class HomeWorkController extends Controller
{

    /**
     * @var PostRepository
     */
    private $postRepo;
    /**
     * @var ProductRepository
     */
    private $productRepo;

    /**
     * HomeWorkController constructor.
     * @param PostRepository $postRepo
     * @param ProductRepository $productRepo
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
    public function contactUs()
    {
        return view('HomeWork.contactUs');
    }

    /**
     * @return mixed
     */
    public function getAllProducts()
    {
        $products = $this->productRepo->getAll();
        return view('HomeWork.catalog', compact('products'));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getProductDetail($id)
    {
        $productDetail = $this->productRepo->getDetails($id);
        return view('HomeWork.catalog', compact('productDetail'));
    }

    /**
     * mixed
     */
    public function searchBy()
    {
        $products = $this->productRepo->searchBy();
        return view('HomeWork.catalog', compact('products'));
    }

    /**
     * @param UploadRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function upload(UploadRequest $request)
    {
        $this->productRepo->create($request);
        return Redirect::back();
    }

    /**
     * @return mixed
     */
    public function getBlog()
    {
        Cache::forget('productsList1');
        $posts = $this->postRepo->author();
        return view('HomeWork.blog', compact('posts'));
    }

    /**
     * @param PostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postAdd(PostRequest $request)
    {
        $this->postRepo->create($request);
        return Redirect::route('blog');
    }

    /**
     * @param $postId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postDelete($postId)
    {
        $this->postRepo->delete($postId);
        return Redirect::route('blog');
    }

    /**
     * @param MailService $mail
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(MailService $mail)
    {
        $mail->feedbackMail();
        return Redirect::route('contact')->with('message', "Thanks for contacting us!");
    }
}
