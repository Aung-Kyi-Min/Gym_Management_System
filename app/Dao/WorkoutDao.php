<?php
namespace App\Dao;

use App\Models\Workout;
use App\Contracts\Dao\WorkoutDaoInterface;

class WorkoutDao implements WorkoutDaoInterface
{
    /**
     * Show Workout
     * @return object
    */
    public function get(): object
    {    
        return Workout::all();
    }
}
