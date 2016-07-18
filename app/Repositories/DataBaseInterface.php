<?php
/**
 * Created by PhpStorm.
 * User: svyatis
 * Date: 17.07.16
 * Time: 18:09
 */

namespace App\Repositories;

interface DataBaseInterface
{
    /**
     * @return mixed
     */
    public function getAll();

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id);

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * @param $id
     * @param array $atributes
     * @return mixed
     */
    public function update($id, array $atributes);

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);
}
