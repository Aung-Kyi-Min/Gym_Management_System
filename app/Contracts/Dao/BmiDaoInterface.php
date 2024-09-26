<?php

namespace App\Contracts\Dao;

/**
 * Interface for user service
*/
interface BmiDaoInterface
{
    /**
     * register
     * @return object
     */
    public function store(): void;

}
