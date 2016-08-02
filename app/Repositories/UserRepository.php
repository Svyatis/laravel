<?php
/**
 * Created by PhpStorm.
 * User: svyatis
 * Date: 18.07.16
 * Time: 15:16
 */

namespace App\Repositories;

use App\Entities\User;

class UserRepository
{

    /**
     * @var User
     */
    private $model;

    /**
     * UserRepository constructor.
     * @param User $model
     */
    public function __construct(User $model)
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
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * @param $id
     * @param array $attributes
     * @return mixed
     * @internal param array $attributes
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
}
