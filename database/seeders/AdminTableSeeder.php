<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        //
        $password = Hash::make('admin1111');
        $adminRecords = [
            ['id' => 1 ,'name' => 'Admin' ,'email' => 'admin@gmail.com' , 'password' => $password ,
             'role' => 0 , 'image' => 'admin.png', 'address' => 'Yangon' , 'gender' => 'male'
            , 'age' => 22 , 'phone' => '09250234234'],
        ];
        User::insert($adminRecords);
    }
}
