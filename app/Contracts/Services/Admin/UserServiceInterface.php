<?php

namespace App\Contracts\Services\Admin;

/**
 * Interface for user service
*/
interface UserServiceInterface
{
    /**
     * Show User
     * @return object
    */
    public function get() : object;

    /**
     * Store User
     * @return void
    */
    public function store() : void;

    /**
     * Return Specific User
     * @return object
    */
    public function edit($id) : object;

    /**
     * Update User
     * @return void
    */
    public function update($id , array $data) : void;

    /**
     * Destroy User
     * @return void 
    */
    public function destroy($id) : void;

    /**
    * search user
    * @return object
    */  
    public function search($search): object;

    /**
     * Return Specific User
     * @return object
    */
    public function editPassword($id): object;

/**
     * Update user password
     *
     * @param $request
     * @param $user
     * @return void
     */

     public function passUpdate($request, $user): void;

}