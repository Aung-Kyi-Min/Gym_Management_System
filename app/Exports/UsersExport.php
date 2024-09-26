<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    private $users;

    public function __construct(Collection $users)
    {
        $this->users = $users;
    }

    public function headings(): array
    {
        return [
            'Id',
            'Name',
            'Email',
            'Password',
            'Role',
            'Image',
            'Address',
            'Gender',
            'Age',
            'Phone',
            'Created At',
            'Updated At',
        ];
    }

    public function collection()
    {
        return $this->users->map(function ($user) {
            return [
                $user->id,
                $user->name,
                $user->email,
                $user->password,
                $user->role,
                $user->image,
                $user->address,
                $user->gender,
                $user->age,
                $user->phone,
                $user->created_at,
                $user->updated_at,
            ];
        });
    }
}
