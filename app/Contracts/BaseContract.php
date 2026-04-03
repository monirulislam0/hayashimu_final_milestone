<?php
namespace App\Contracts;
interface BaseContract{
    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * @param array $attributes
     * @param int $id
     * @return mixed
     */
    public function update(array $attributes, int $id);

    /**
     * @param $column
     * @param $orderBy
     * @param $sortBy
     * @return mixed
     */

    public function all($column=array('*'),$orderBy = 'id',$sortBy='desc');

    /**
     * @param int $id
     * @return mixed
     */
    public function find(int $id);

    /**
     * @param int $id
     * @return mixed
     */
    public function findOneOrFail(int $id);

    /**
     * @param array $data
     * @return mixed
     */
    public function findBy(array $data);

    /**
     * @param array $data
     * @return mixed
     */
    public  function findOneBy(array $data);

    /**
     * @param array $data
     * @return mixed
     */

    public function findOneByeOrFail(array $data);

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id);

}
