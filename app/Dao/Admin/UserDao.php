<?php

namespace App\Dao\Admin;

use App\Contracts\Dao\Admin\UserDaoInterface;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserDao implements UserDaoInterface
{
    /**
     * Show User
     * @return object
    */
    public function get(): object
    {    
        return User::where('role' , 1)->paginate(5);
    }

    /**
     * Store User
     * @return void
    */
    public function store() : void
    {
        $user = New User();
        $user->name = request('name');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->phone = request('phone');
        $user->gender = request('gender');
        $user->age = request('age');
        $user->role = request('role');
        $image = request()->file('image');
        if (request()->hasFile('image')) {
            $user->image = request()->file('image')->getClientOriginalName();
        }else {
            $user->image = 'default.png';
        }
        
        $user->address = request('address');
        
        $user->save();
    }

    /**
     * Return Specific User
     * @return object
    */
    public function edit($id) : object
    {
        return User::findOrFail($id);
    }

    /**
     * Update Workout
     * @return void
    */
    public function update($id , array $data) : void
    {
        $user = User::findOrFail($id);

        if ($user) {
            $user->name = $data['name'];
            $user->role = $data['role'];
            if (isset($data['image']) && $data['image']->isValid()) {
                $user->image = $data['image']->getClientOriginalName();
            }
            $user->address = $data['address'];
            $user->gender = $data['gender'];
            $user->age = $data['age'];
            $user->phone = $data['phone'];
        
            $user->save();
        }
    }
    
    /**
     * Destroy User
     * @return void 
    */
    public function destroy($id) : void
    {
        $user = User::findOrFail($id);
        $user->delete();
    }

    public function search($search): object
    {
        $query = User::query()->where('role', 1);

        if ($search !== "") 
        {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%")
                    ->orWhere('email', 'LIKE', "%$search%")
                    ->orWhere('address', 'LIKE', "%$search%")
                    ->orWhere('phone', 'LIKE', "%$search%")
                    ->orWhere('age', 'LIKE', "%$search%")
                    ->orWhere(function ($query) use ($search) {
                        $query->where('gender', '=', $search);
                    });
            });
        }
        return $query->orderBy('created_at', 'asc')
        ->paginate(5)
        ->appends(request()->all());
    }

      /**
     * Return Specific User
     * @return object
    */
    public function editPassword($id): object
    {
        return User::findOrFail($id);
    }
    
    
    /**
     * Update user password
     *
     * @param $request
     * @param $user
     * @return void
     */

    public function passUpdate($request, $user): void
    {
        $user->password = Hash::make($request->password);
        $user->save();
    }

}