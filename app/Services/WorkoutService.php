<?php

namespace App\Services;

use App\Contracts\Dao\WorkoutDaoInterface;
use App\Contracts\Services\WorkoutServiceInterface;

class WorkoutService implements WorkoutServiceInterface
{
    /**
     * Workout Dao
     */
    private $workoutDao;

    /**
     * Class Constructor
     * @param WorkoutDaoInterface
     * @return void
     */
    public function __construct(WorkoutDaoInterface $workoutDao)
    {
        $this->workoutDao = $workoutDao;
    }

    /**
     * Show Workout
     * @return object
    */
    public function get() : object
    {
        return $this->workoutDao->get();
    }
}