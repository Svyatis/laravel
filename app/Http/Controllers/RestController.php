<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository;
use App\Repositories\ProductRepository;
use App\Repositories\UserRepository;
use App\Services\MailService;
use Illuminate\Http\Request;
use Auth;

class RestController extends Controller
{
    private $userRepo;
    private $productRepo;
    private $postRepo;

    /**
     * RestController constructor.
     * @param UserRepository $userRepo
     * @param ProductRepository $productRepo
     * @param PostRepository $postRepo
     */
    public function __construct(
        UserRepository $userRepo,
        ProductRepository $productRepo,
        PostRepository $postRepo
    ) {
        $this->middleware('cors');
        $this->userRepo = $userRepo;
        $this->productRepo = $productRepo;
        $this->postRepo = $postRepo;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function checkAuth(Request $request)
    {
        $post = json_decode($request->getContent(), true);

        $credentials = [
            'email' => $post['email'],
            'password' => $post['password'],
        ];

        if (!Auth::attempt($credentials)) {
            return response('User name and password does not match', 403);
        }

        return response()->json(Auth::user(), 201);

//        Session::token()
    }

    /**
     * @param ProductRepository $productRepo
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(ProductRepository $productRepo)
    {
        $products = $productRepo->getAll();
        return response()->json($products);
    }

    /**
     * @param PostRepository $postRepo
     * @return \Illuminate\Http\JsonResponse
     */
    public function blogGet(PostRepository $postRepo)
    {
        $posts = $postRepo->getAll();
        return response()->json($posts);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addPost(Request $request)
    {
        $post = $this->postRepo->createAngular($request);
        return response()->json($post);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function postDel(Request $request)
    {
        $jsonId = json_decode($request->getContent(), true);
        $postId = $jsonId['postId'];

        $this->postRepo->delete($postId);
        return $postId;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $post = json_decode($request->getContent(), true);

        $credentials = [
            'name' => $post['name'],
            'email' => $post['email'],
            'password' => bcrypt($post['password']),
        ];

        $newUser = $this->userRepo->create($credentials);

        return response()->json($newUser);
    }

    /**
     * @param Request $request
     * @param MailService $mailService
     * @return string
     */
    public function contactSend(Request $request, MailService $mailService)
    {
        $jsonData = json_decode($request->getContent(), true);
        $data       = [ 'name'          => $jsonData['name'],
                        'email'         => $jsonData['email'],
                        'user_message'  => $jsonData['message']
        ];
        $mailService->feedbackJSONMail($data);
        return "success";
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * @param $id
     * @param ProductRepository $products
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id, ProductRepository $products)
    {
        return response()->json($products->getDetails($id));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProductDetail($id)
    {
        $productDetail = $this->productRepo->getDetails($id);
        return response()->json($productDetail);
    }

    public function productAdd(Request $request)
    {
        $data = json_decode($request->getContent(), true);
//        $this->productRepo->create($data);
        return $data;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
