<?php

namespace App\Dao;

use App\Contracts\Dao\AuthDaoInterface;
use App\Models\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthDao implements AuthDaoInterface
{
    public function register(array $data): object
    {
        if (isset($data['image']) && $data['image']->isValid()) {
            $image = $data['image']->getClientOriginalName();
        } else {
            $image = 'default.png';
        }

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'image' => $image,
            'address' => $data['address'],
            'gender' => $data['gender'],
            'age' => $data['age'],
            'phone' => $data['phone'],
        ]);

        return $user;
    }
}
