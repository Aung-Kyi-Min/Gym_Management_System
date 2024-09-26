<?php
namespace App\Http\Controllers\Admin;


use Carbon\Carbon;
use App\Models\User;
use App\Models\Member;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UserProfileEditRequest;
use App\Contracts\Services\Admin\UserServiceInterface;
use App\Contracts\Services\Admin\AdminServiceInterface;
use App\Contracts\Services\Admin\MemberServiceInterface;
use App\Contracts\Services\Admin\WorkoutServiceInterface;
use App\Contracts\Services\Admin\InstructorServiceInterface;



class AdminController extends Controller
{
   private $workoutService;
   private $instructorService;
   private $userService;
   private $memberService;
   private $yearUserCount;
   private $yearMemberCount;
   private $monthUserCount;
   private $monthMemberCount;
   private $weekUserCount;
   private $weekMemberCount;
   private $adminService;

     /**
     * Create a new controller instance.
     * @param AdminServiceInterface $taskServiceInterface
     * @param WorkoutServiceInterface $taskServiceInterface
     * @param InstructorServiceInterface $taskServiceInterface
     * @param UserServiceInterface $taskServiceInterface
     * @return void
     */

   public function __construct(AdminServiceInterface $adminServiceInterface , WorkoutServiceInterface $workoutServiceInterface , InstructorServiceInterface $instructorServiceInterface , UserServiceInterface $userServiceInterface , MemberServiceInterface $memberServiceInterface)
   {
      $this->workoutService = $workoutServiceInterface;
      $this->instructorService = $instructorServiceInterface;
      $this->userService = $userServiceInterface;
      $this->memberService = $memberServiceInterface;
      $this->yearUserCount = $this->getUserDataByYear();
      $this->yearMemberCount = $this->getMemberDataByYear();
      $this->monthUserCount = $this->getUserDataByMonth();
      $this->monthMemberCount = $this->getMemberDataByMonth();
      $this->weekUserCount = $this->getUserDataByWeek();
      $this->weekMemberCount = $this->getMemberDataByWeek();
      $this->adminService = $adminServiceInterface;
   }

   public function index()
   {
      $loginuser = auth()->user();
      $workout = $this->workoutService->get();
      $instructor = $this->instructorService->get();
      $user = $this->userService->get();
      $member = $this->memberService->get();
      $workoutCount = $workout->total();
      $instructorCount = $instructor->total();
      $userCount = $user->total();
      $memberCount = $member->total();
      $currentMonth = Carbon::now()->format('Y-m');
      $currentYear = Carbon::now()->format('Y');
      $startDate = Carbon::parse($currentMonth)->startOfMonth()->format('d');
      $endDate = Carbon::parse($currentMonth)->endOfMonth()->format('d');
      return view('admin.index' , [ 'workoutCount' => $workoutCount ,
                                    'instructorCount' => $instructorCount ,
                                    'userCount' => $userCount,
                                    'memberCount' => $memberCount,
                                    'yearUserCount' => $this->yearUserCount,
                                    'yearMemberCount' => $this->yearMemberCount,
                                    'monthUserCount' => $this->monthUserCount,
                                    'monthMemberCount' => $this->monthMemberCount,
                                    'weekUserCount' => $this->weekUserCount,
                                    'weekMemberCount' => $this->weekMemberCount,
                                    'currentMonth' => $currentMonth,
                                    'currentYear' => $currentYear,
                                    'startDate' => $startDate,
                                    'endDate' => $endDate,
                                    'loginuser' => $loginuser,
                                    ]
        );
    }

    private function getUserDataByWeek()
    {
        $currentYear = Carbon::now()->format('Y');
        $weeks = range(1,7);
        $weekUserCount = [] ;
        foreach($weeks as $week)
        {
            $count = User::whereRaw('DAYOFWEEK(created_at) = ?', [$week])
                    ->whereYear('created_at', '=', $currentYear)
                    ->count();
            $weekUserCount[$week] = $count;
        }
        return $weekUserCount;
   }

    private function getMemberDataByWeek()
    {
        $currentYear = Carbon::now()->format('Y');
        $weeks = range(1,7);
        $weekMemberCount = [] ;
        foreach($weeks as $week)
        {
            $count = Member::whereRaw('DAYOFWEEK(created_at) = ?', [$week])
                    ->whereYear('created_at', '=', $currentYear)
                    ->count();
            $weekMemberCount[$week] = $count;
        }
        return $weekMemberCount;
    }

    private function getUserDataByMonth()
    {
        $currentMonth = Carbon::now()->format('Y-m');
        $startDate = Carbon::parse($currentMonth)->startOfMonth()->format('d');
        $endDate = Carbon::parse($currentMonth)->endOfMonth()->format('d');
        $dates = range($startDate, $endDate);
        $monthUserCount = [] ;

        foreach($dates as $date) {
            $count = User::whereDate('created_at', '=', $currentMonth.'-'.$date)->count();
            $monthUserCount[$date] = $count;
        }
        return $monthUserCount;
     }

    private function getMemberDataByMonth()
    {
        $currentMonth = Carbon::now()->format('Y-m');
        $startDate = Carbon::parse($currentMonth)->startOfMonth()->format('d');
        $endDate = Carbon::parse($currentMonth)->endOfMonth()->format('d');
        $dates = range($startDate, $endDate);
        $monthMemberCount = [] ;

        foreach($dates as $date)
        {
            $count = Member::whereDate('created_at', '=', $currentMonth.'-'.$date)->count();
            $monthMemberCount[$date] = $count;
        }
        return $monthMemberCount;
    }

    private function getUserDataByYear()
    {
        $currentYear = Carbon::now()->format('Y');
        $months = range(1,12);
        $yearUserCount = [];
        foreach($months as $month) {
            $count = User::whereMonth('created_at', '=', str_pad($month, 2, '0', STR_PAD_LEFT))
                     ->whereYear('created_at', '=', $currentYear)
                     ->count();
            $yearUserCount[$month] = $count;
        }
        return $yearUserCount;
    }

    private function getMemberDataByYear()
    {
        $currentYear = Carbon::now()->format('Y');
        $months = range(1,12);
        $yearMemberCount = [];
        foreach($months as $month)
        {
            $count = Member::whereMonth('created_at', '=', str_pad($month, 2, '0', STR_PAD_LEFT))
                    ->whereYear('created_at', '=', $currentYear)
                    ->count();
            $yearMemberCount[$month] = $count;
        }
        return $yearMemberCount;
    }

    public function member()
    {
        $loginuser = auth()->user();
        return view('admin.member.member' , ['loginuser' => $loginuser]);
    }

    public function created()
    {
        $loginuser = auth()->user();
        return view('email.created' , ['loginuser' => $loginuser]);
    }

    public function expire()
    {
        $loginuser = auth()->user();
        return view('email.expire' , ['loginuser' => $loginuser]);
    }

    public function feedback()
    {
        $feedbacks = $this->adminService->feedback();
        return view('admin.feedback.feedback' , ['feedbacks' => $feedbacks]);
    }
}
