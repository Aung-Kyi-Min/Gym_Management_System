<?php

namespace App\Imports;

use App\Models\Instructor;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class InstructorsImport implements ToModel , WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Instructor([
            'name' => $row['name'],
            'speciality' => $row['speciality'],
            'image' => $row['image'],
            'email' => $row['email'],
            'price' => $row['price'],
            'access_time' => $row['access_time'],
            'created_at' => $row['created_at'],
            'updated_at' => $row['updated_at'],
        ]);
    }
}
