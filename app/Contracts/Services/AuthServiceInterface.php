<?php

namespace App\Contracts\Services;

/**
 * Interface for user service
*/
 interface AuthServiceInterface
{
    /**
     * register
     * @return object
     */
    public function register(array $data): object;
}
