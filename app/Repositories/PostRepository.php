<?php
/**
 * Created by PhpStorm.
 * User: svyatis
 * Date: 17.07.16
 * Time: 19:28
 */

namespace App\Repositories;

use App\Entities\Post;
use Cache;
use Request;
use Auth;

class PostRepository
{

    /**
     * @var Post
     */
    private $model;

    /**
     * PostRepository constructor.
     * @param Post $model
     */
    public function __construct(Post $model)
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        $posts = Cache::remember('allPosts', 30, function () {
            return $this->model->all();
        });
        return $posts;
    }

    /**
     * @param $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create($request)
    {
        $this->model->create([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'author_id' => Auth::user()->id
        ]);
        Cache::forget('allPosts');
        return back();
    }

    public function createAngular($request)
    {
        $post = json_decode($request->getContent(), true);

        $newpost = $this->model->create([
            'title'     => $post['title'],
            'content'   => $post['content'],
            'author_id' => '1'
            ]);
        Cache::forget('allPosts');
        return $newpost;
    }

    /**
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update($id, array $attributes)
    {
        $user = $this->model->findOrFail($id);
        $user->update($attributes);
        $user->save();
        return $user;
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $this->model->find($id)->delete();
        Cache::forget('allPosts');
        return true;
    }

    /**
     * @return mixed
     */
    public function author()
    {
        $page = Request::input('page', '1');
        $products = Cache::remember('productsList' . $page, 1, function() {
            return $this->model->with('author')->orderBy('id', 'DESC')->paginate(5);
        });
        return $products;
    }
}
