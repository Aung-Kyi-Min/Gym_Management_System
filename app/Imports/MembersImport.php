<?php

namespace App\Imports;

use App\Models\Instructor;
use App\Models\Member;
use App\Models\Payment;
use App\Models\User;
use App\Models\Workout;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MembersImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */


    public function model(array $row)
    {
        $m_wokout = Workout::where('name', $row['workout_id'])->first();
        $m_instructor = Instructor::where('name', $row['instructor_id'])->first();
        $m_user = User::where('name', $row['user_id'])->first();
        return new Member([
            'user_id' => $m_user->id ?? null,
            'workout_id' => $m_wokout->id ?? null,
            'instructor_id' => $m_instructor->id ?? null,
            'sub_month' => $row['sub_month'],
            'joining_date' => $row['joining_date'],
            'end_date' => $row['end_date'],
        ]);

    }
}
