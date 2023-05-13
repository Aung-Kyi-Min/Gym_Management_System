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
    public function update($id) : void;

     /**
     * Destroy Major
     * @return void 
    */
    public function destroy($id) : void;
}
