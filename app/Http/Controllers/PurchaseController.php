<?php

namespace App\Http\Controllers;

use App\Contracts\Services\Admin\InstructorServiceInterface;
use App\Contracts\Services\Admin\UserServiceInterface;
use App\Contracts\Services\Admin\WorkoutServiceInterface;
use App\Contracts\Services\BmiServiceInterface;
use App\Http\Requests\BmiRequest;
use App\Http\Requests\MemberCreateRequest;
//use App\Http\Requests\PurchaseRequest;
use App\Http\Requests\PurchaseCreateRequest;
use App\Models\BmiRecord;
use App\Models\Discount;
use App\Models\Instructor;
use App\Models\Member;
use App\Models\Payment;
use App\Models\workout;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{

    private $workoutService;
    private $instructorService;
    private $userService;
    private $bmiService;

    /**
     * @param AuthServiceInterface $authServiceInterface
     * @return void
     */

    public function __construct(WorkoutServiceInterface $workoutServiceInterface,
        InstructorServiceInterface $instructorServiceInterface, BmiServiceInterface $bmiServiceInterface ,
        UserServiceInterface $userServiceInterface) {
        $this->workoutService = $workoutServiceInterface;
        $this->instructorService = $instructorServiceInterface;
        $this->userService = $userServiceInterface;
        $this->bmiService = $bmiServiceInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guest()) {
            return redirect()->route('auth.login');
        }
        $member = Member::all();
        $workouts = $this->workoutService->userget();
        $instructors = $this->instructorService->userget();

        $user = Auth::user();

        $discount = Discount::all();

        return view('user.purchase', ['workouts' => $workouts, 'member' => $member, 'instructors' => $instructors,
            'user' => $user, 'discount' => $discount]);
    }

    public function recheck()
    {
        return redirect()->route('member.purchase');
    }

    public function getPrice(MemberCreateRequest $request)
    {
        $workout = Workout::find($request->workout);
        $instructor = Instructor::find($request->instructor);
        $join_duration = $request->join_duration;
        $payment = $request->payment;
        $joining_date = $request->joining_date;
        $user = Auth::user();

        $join_date = Carbon::parse($request->joining_date);
        $sub_months = $request->join_duration;
        $end_date = $join_date->addMonths($sub_months);
        $end_date = Carbon::parse($end_date)->format('Y-m-d');
        $discounts = Discount::all()->toArray();
        $discount = 0;
        if ($instructor == null) {
            $price = $workout->price * $join_duration;
        } else {
            $price = $workout->price + $instructor->price;
            $price *= $join_duration;
        }
        foreach ($discounts as $d) {
            if ($join_duration >= $d['min_months'] && $join_duration <= $d['max_months']) {
                $discount = $d['dis_percent'];
                break;
            }
        }
        $basePrice = $price;
        $finalPrice = $basePrice - ($basePrice * $discount / 100);
        return view('user.subscription', ['price' => $finalPrice, 'workout' => $workout,
            'instructor' => $instructor, 'user' => $user, 'joining_date' => $joining_date,
            'end_date' => $end_date, 'payment' => $payment, 'join_duration' => $join_duration ,'discount' => $discount,
            'basePrice' => $basePrice,]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PurchaseCreateRequest $request)
    {
        $member = new Member;
        $member->user_id = $request->name;
        $member->instructor_id = $request->instructor;
        $member->workout_id = $request->workout;
        $member->sub_month = $request->join_duration;
        $member->joining_date = $request->joining_date;
        $member->end_date = $request->end_date;
        $member->save();

        $payment = new Payment;
        $payment->member_id = $member->id;
        $payment->amount = $request->price;
        $payment->payment = $request->payment;
        $payment->save();

        return redirect()->route('user.index')->with('success', 'Member has purchased successfully.');

    }

    public function calculateBMI(BmiRequest $request)
    {
        $height = $request->input('height');
        $weight = $request->input('weight');

        $bmiaa = calculateBmi($weight, $height);
        $bmi_calculate = number_format($bmiaa, 2);

        $this->bmiService->store();
        return redirect()->route('member.purchase')->with('bmi_calculate', $bmi_calculate);
    }

}
