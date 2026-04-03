<?php

namespace App\Contracts;


interface NewsContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listNews(string $order='id',string $sort = 'desc', array $columns = ['*'],int $paginetion=null);

    /**
     * @param int $id
     * @return mixed
     */
    public function findNewsById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createNews(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateNews(array $params);

    /**
     * @param int $id
     * @return bool
     */
    public function deleteNews(int $id);

}
