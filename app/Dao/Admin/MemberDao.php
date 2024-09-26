<?php

namespace App\Dao\Admin;

use App\Models\Member;
use App\Models\Payment;
use App\Contracts\Dao\Admin\MemberDaoInterface;

class MemberDao implements MemberDaoInterface
{
    /**
     * Show Member
     * @return object
    */
    public function get(): object
    {   
        return Member::paginate(5);
    }

    /**
     * Show Payment
     * @return object
    */

    public function paymentsget(): object
    {
        return Payment::paginate(5);
    }

    /**
     * Destroy Member
     * @return void 
    */
    public function destroy($id) : void
    {
        $member = Member::findOrFail($id);
        $member->delete();
    }

    public function search($search): object
    {
        $query = Member::query();

        if ($search !== "") {
            $query->whereHas('user', function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%")
                    ->orWhere('email', 'LIKE', "%$search%");
            })
            ->orWhere('sub_month', 'LIKE', "%$search%")
            ->orWhere('joining_date', 'LIKE', "%$search%")
            ->orWhere('end_date', 'LIKE', "%$search%")
            ->orWhereHas('workout', function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%");
            })
            ->orWhereHas('instructor', function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%");
            });
        }

        return $query->orderBy('created_at', 'asc')
            ->paginate(5)
            ->appends(request()->all());
    }

}
