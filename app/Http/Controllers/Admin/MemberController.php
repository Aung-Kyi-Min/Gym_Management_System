<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\Services\Admin\MemberServiceInterface;
use Illuminate\Support\Facades\Mail;
use App\Mail\Expire;
use Carbon\Carbon;

class MemberController extends Controller
{
    private $memberService;

    /**
      * Create a new controller instance.
      * @param MemberInterface $taskServiceInterface
      * @return void
      */

    public function __construct(MemberServiceInterface $memberServiceInterface)
    {
       $this->memberService = $memberServiceInterface;
    }

    /**
     * Show Member
     * Show Payment
     * @return object
    */
    public function member(Request $request)
    {
        $tdyDate = Carbon::now();
        $expiremembers = $this->memberService->get();
        foreach ($expiremembers as $member) {
            if ($member->end_date < $tdyDate) {
                Mail::to($member->user->email)->send(new Expire());
                $this->memberService->destroy($member->id);
            }
        }
        $search = $request->input('search', ''); // Define and assign a value to $search

        $members = $this->memberService->search($search);
        $payments = $this->memberService->paymentsget();
        $loginuser = auth()->user();

        return view('admin.member.member', [
            'loginuser' => $loginuser,
            'members' => $members,
            'payments' => $payments,
            'search' => $search
        ]);
    }

    /**
     * Destroy Member
     * @return void 
    */
    public function destroy($id)
    {
        $this->memberService->destroy($id);
        return redirect('/admin/member');
    }


}
