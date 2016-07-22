<?php
/**
 * Created by PhpStorm.
 * User: svyatis
 * Date: 21.07.16
 * Time: 22:09
 */

namespace App\Repositories;

use App\Entities\Product;

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
        return $this->model->all();
    }

    public function getDetails($id)
    {
        return $this->model->find($id);
    }

    public function create(array $attributes)
    {
        $this->model->create($attributes);
        return back();
    }

}
