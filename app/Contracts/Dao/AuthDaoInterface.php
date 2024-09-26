<?php

namespace App\Contracts\Dao;

/**
 * Interface for user service
*/
interface AuthDaoInterface
{
    /**
     * register
     * @return object
     */
    public function register(array $data): object;

}
