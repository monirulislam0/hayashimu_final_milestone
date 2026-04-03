<?php

namespace App\Contracts;
use App\Enums\PageShortCodeEnum;

interface StaticPageContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listStatic(string $order='id',string $sort = 'desc', array $columns = ['*'],int $paginetion=null);

    /**
     * @param int $id
     * @return mixed
     */
    public function findStaticById(int $id);
    public function findStaticByShortcode(PageShortCodeEnum $shortcode);

    /**
     * @param array $params
     * @return mixed
     */
    public function createStatic(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateStatic(array $params,$shortcode);
    public function updateWhyIChoose(array $params);

}
