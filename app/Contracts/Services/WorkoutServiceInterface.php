<?php

namespace App\Contracts\Services;

/**
 * Interface for user service
*/
interface WorkoutServiceInterface
{
    /**
     * Show User
     * @return object
    */
    public function get() : object;
}