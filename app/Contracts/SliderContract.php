<?php

namespace App\Contracts;


/**
 * Interface CategoryContract
 * @package App\Contracts
 */
interface SliderContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listSlider(string $order='id',string $sort = 'desc', array $columns = ['*'],int $paginetion=null);

    /**
     * @param int $id
     * @return mixed
     */
    public function findSliderById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createSlider(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateSlider(array $params);

    /**
     * @param int $id
     * @return bool
     */
    public function deleteSlider(int $id);

}
