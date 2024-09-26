<?php

namespace App\Dao;

use App\Models\User;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Contracts\Dao\UserDaoInterface;

class UserDao implements UserDaoInterface
{
    
    /**
     * send userfeedback
     * @return object
     */
    public function send():void
    {
        $user = Auth::user();
        $filter = Feedback::where('user_id', request('id'))->first();
        
        if(!$filter) {
            $feedback = new Feedback();
            $feedback->message=request('message');
            $feedback->user_id = request('id');
            $feedback->save();
        }else {
            $feedback = Feedback::where('user_id', request('id'))->first();
            $feedback->message=request('message');
            $feedback->user_id = request('id');
            $feedback->save();
        }
        
    }
    /**
    * Return Users//user profile
    * @return object
    */
    public function edit($id) : object
    {
        return User::findOrFail($id);
    }

    /**
    * Update Users/user profile
    * @return void
    */
    public function update($id): void
    {
        // Retrieve the currently logged-in user
        $user = auth()->user();
    
        // Update the user profile data
        $user->name = request('name');
        $user->gender = request('gender');
        $user->age = request('age');
        $user->phone = request('phone');
        $user->address = request('address');
        
        // Handle the image field

        if (request()->hasFile('image')) {
            $name = request('image')->getClientOriginalName();
            request('image')->storeAs('public/images/admin/user', $name);
            $user->image = $name;
        } 
    
        // Save the changes
        $user->save();
    }

    /**
     * Update user password
     *
     * @param $request
     * @param $user
     * @return void
    */
    public function updatePassword($request,$user):void
    {
        $user->password = Hash::make($request->password);
        $user->save();
    }

}