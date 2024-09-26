<?php
namespace App\Dao;

use App\Models\Member;
use App\Contracts\Dao\MemberDaoInterface;

class MemberDao implements MemberDaoInterface
{
    public function store(): void
    {
        $member = new Member;
        $member->user_id = request('name');
        $member->instructor_id = request('instructor');
        $member->workout_id = request('workout');
        $member->sub_month = request('join_duration');
        $member->joining_date = request('joining_date');
        $member->end_date = request('end_date');
        $member->save();
    }

}
