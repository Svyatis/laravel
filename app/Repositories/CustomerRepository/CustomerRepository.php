<?php
/**
 * Created by PhpStorm.
 * User: svyatis
 * Date: 17.07.16
 * Time: 19:36
 */

namespace App\Repositories\CustomerRepository;

use App\Entities\Customer;

class CustomerRepository
{
    /**
     * @var Customer
     */
    private $model;

    /**
     * CustomerRepository constructor.
     * @param Customer $model
     */
    public function __construct(Customer $model)
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

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->model->find($id);
    }

    /**
     * @param array $attributes
     * @return static
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * @param $id
     * @param array $atributes
     * @return mixed
     */
    public function update($id, array $atributes)
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
}