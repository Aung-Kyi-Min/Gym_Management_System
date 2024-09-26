<?php

namespace App\Exports;

use App\Models\Member;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class MembersExport implements FromCollection
, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Member::all();
    }

    public function headings(): array
    {
        return [
            'Id',
            'user_id',
            'workout_id',
            'instructor_id',
            'sub_month',
            'joining_Date',
            'end_Date',
        ];
    }

    public function map($member): array
    {
        return [
            $member->id,
            $member->user->name,
            $member->workout->name,
            $member->instructor->name ?? null,
            $member->sub_month,
            $member->joining_date,
            $member->end_date,
        ];
    }
}
