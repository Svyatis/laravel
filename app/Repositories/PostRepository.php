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
        return back();
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
