<?php

namespace App\Contracts\Services\Admin;

/**
 * Interface for user service
*/
interface WorkoutServiceInterface
{
    /**
     * Show Workout
     * @return object
    */
    public function get() : object;

    /**
     * Show Workout for User
     * @return object
    */
    public function userget(): object;

    /**
     * Store Workout
     * @return void
    */
    public function store() : void;

     /**
     * Return Specific Workout
     * @return object
    */
    public function edit($id) : object;

    /**
     * Update Workout
     * @return void
    */
    public function update($id , array $data) : void;

    /**
     * Destroy Workout
     * @return void 
    */
    public function destroy($id) : void;

      /**
    * search Workout
    * @return object
    */  
    public function search($search): object;
}
