<?php

namespace App\Contracts;

interface ServiceContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listSerice(string $order='id',string $sort = 'desc', array $columns = ['*'],int $paginetion=null);

    /**
     * @param int $id
     * @return mixed
     */
    public function findServiceById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createService(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateSerivce(array $params);

    /**
     * @param int $id
     * @return bool
     */
    public function deleteService(int $id);

}
