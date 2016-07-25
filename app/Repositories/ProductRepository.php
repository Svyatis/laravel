<?php
/**
 * Created by PhpStorm.
 * User: svyatis
 * Date: 21.07.16
 * Time: 22:09
 */

namespace App\Repositories;

use App\Entities\Product;
use Illuminate\Support\Facades\Input;
use Auth;
use Session;
use Cache;

class ProductRepository
{
    /**
     * @var Product
     */
    private $model;

    /**
     * ProductRepository constructor.
     * @param Product $model
     */
    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        $products = Cache::remember('allProducts', 30, function () {
            return $this->model->all();
        });
        return $products;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getDetails($id)
    {
        $product = Cache::remember('productDetails', 30, function () use ($id) {
            return $this->model->find($id);
        });
        return $product;
    }

    /**
     * @param $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create($request)
    {
        $files = $request->file('image');
        $destinationPath = env('UPLOAD_PATH');
        $extension = $files->getClientOriginalExtension();
        $fileName = Auth::user()->name . rand(11111, 99999).'.'.$extension;
        $files->move($destinationPath, $fileName);
        $image = $destinationPath . "/" . $fileName;
        Session::flash('success', "Your file is : $image");
        $product = $this->model->create([
            'name'          => $request->get('name'),
            'description'   => $request->get('description'),
            'image'         => $image]);
        $manufactors = Input::has('manufactors') ? Input::get('manufactors') : [];
        $colors = Input::has('colors') ? Input::get('colors') : [];
        if (isset($manufactors)) {
            foreach ($manufactors as $manufactor) {
                $product->manufactors()->attach($manufactor);
            }
        }
        if (isset($colors)) {
            foreach ($colors as $color) {
                $product->colors()->attach($color);
            }
        }

        return back();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function searchBy()
    {
        $names = Input::has('names') ? Input::get('names') : null;
        $manufactors = Input::has('manufactors') ? Input::get('manufactors') : null;
        $colors = Input::has('colors') ? Input::get('colors') : null;
        if ($names || $manufactors || $colors !== null) {
            $products = $this->model->where('name', 'like', '%'.$names.'%')
            ->whereHas('manufactors', function ($q) use ($manufactors) {
                $q->where('name', 'LIKE', '%' . $manufactors . '%');
            })->whereHas('colors', function ($q) use ($colors) {
                $q->where('name', 'LIKE', '%' . $colors . '%');
            })->get();
        } else {
            $products = $this->model->all();
        }
        return $products;
    }
}
