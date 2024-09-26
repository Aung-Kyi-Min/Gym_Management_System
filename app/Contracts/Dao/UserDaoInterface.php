<?php

namespace App\Contracts\Dao;

/**
 * Interface for user service
*/
interface UserDaoInterface
{
    /**
     * send user feedback
     * @return void
     */
    public function send():void;

    /**
    * Return Users//user profile
    * @return object
    */
    public function edit($id) : object;

    /**
    * Update Users/user profile
    * @return void
    */
    public function update($id) : void;

 /**
     * Update user password
     *
     * @param $request
     * @param $user
     * @return void
    */
    public function updatePassword($request,$user):void;

}
