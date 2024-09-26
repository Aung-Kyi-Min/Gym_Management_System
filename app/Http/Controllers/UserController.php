<?php

namespace App\Http\Controllers;

use App\Contracts\Services\Admin\AdminServiceInterface;
use App\Contracts\Services\Admin\InstructorServiceInterface;
use App\Contracts\Services\Admin\WorkoutServiceInterface;
use App\Contracts\Services\UserServiceInterface;
use App\Exports\MembersExport;
use App\Exports\UsersExport;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ImportExcelInstructorRequest;
use App\Http\Requests\ImportExcelMemberRequest;
use App\Http\Requests\ImportExcelUserRequest;
use App\Http\Requests\UserFeedbackRequest;
use App\Http\Requests\UserProfileEditRequest;
use App\Imports\InstructorsImport;
use App\Imports\MembersImport;
use App\Imports\UsersImport;
use App\Models\Feedback;
use App\Models\Member;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    private $workoutService;
    private $instructorService;
    private $adminService;
    private $userService;

    /**
     * Create a new controller instance.
     * @param WorkoutInterface $AdminServiceInterface $InstructorServiceInterface
     * @return void
     */

    public function __construct(UserServiceInterface $userServiceInterface, WorkoutServiceInterface $workoutServiceInterface, AdminServiceInterface $adminServiceInterface, InstructorServiceInterface $instructorServiceInterface)
    {
        $this->workoutService = $workoutServiceInterface;
        $this->adminService = $adminServiceInterface;
        $this->instructorService = $instructorServiceInterface;
        $this->userService = $userServiceInterface;
    }

    //
    public function userProfile()
    {
        if (Auth::guest()) {
            return redirect()->route('auth.login');
        }

        $user = Auth::user(); // Retrieve the currently logged-in user

        return view('user.profile')->with('user', $user);

    }

    /**
     * Show User
     * @return object
     */
    public function index()
    {
        $user = Auth::user();
        $instructors = $this->instructorService->userget();
        $instructorCounts = $instructors->count();
        $feedbacks =  Feedback::orderBy('created_at', 'desc')->take(5)->get();

        return view('user.index', [
            'instructors' => $instructors,
            'instructorCounts' => $instructorCounts,
            'feedbacks' => $feedbacks,
            'user' => $user,
        ]);
    }

    /**
     * Return feedback
     * @return object
     */
    public function feedback()
    {
        if (Auth::guest()) {
            return redirect()->route

                ('auth.login');
        }
        $user = Auth::user();

        return view('user.feedback')->with('user', $user);
    }

    public function workout()
    {
        if (Auth::guest()) {
            return redirect()->route('auth.login');
        }
        $user = Auth::user();
        $workouts = $this->workoutService->userget();
        $workoutCounts = $workouts->count();
        return view('user.workoutlist', ['workouts' => $workouts, 'workoutCounts' => $workoutCounts, 'user' => $user]);
    }

    public function purchase()
    {
        if (Auth::guest()) {
            return redirect()->route('auth.login');
        }
        return view('user.purchase');
    }

    public function successPurchase()
    {
        return view('user.success-purchase');
    }

    public function exportUsers()
    {
        $user = $this->adminService->exportuser();
        return Excel::download(new UsersExport($user), 'users.xlsx');

    }

    public function exportMembers()
    {
        return Excel::download(new MembersExport(), 'members.xlsx');
    }

    public function importView()
    {
        return view('admin.user.Userupload');
    }

    public function import(ImportExcelUserRequest $request)
    {
        if ($request->file('file')) {
            try {
                $import = new UsersImport();
                Excel::import($import, request()->file('file'));
                return redirect()->back()->with('message', 'File Imported Successfully...');
            } catch (\Exception $e) {
                if ($e->getCode() == 23000) {
                    $errors = [
                        'Duplicate data found. Please check your file and try again.',
                    ];
                    throw ValidationException::withMessages($errors);
                }
            }
        }
    }

    public function importViews()
    {
        return view('admin.instructor.Instructorupload');
    }

    public function imports(ImportExcelInstructorRequest $request)
    {
        if ($request->file('file')) {
            try {
                $import = new InstructorsImport();
                Excel::import($import, $request->file('file'));
                return redirect()->back()->with('message', 'File Imported Successfully...');
            } catch (\Exception $e) {
                if ($e->getCode() == 23000) {
                    $errors = [
                        'Duplicate data found. Please check your file and try again.',
                    ];
                    throw ValidationException::withMessages($errors);
                }
            }
        }
    }

    public function importV()
    {
        return view('admin.member.Memberupload');
    }

    public function import_Views(ImportExcelMemberRequest $request)
    {
        if ($request->file('file')) {
            try {
                $import = new MembersImport();
                Excel::import($import, $request->file('file'));
                return redirect()->back()->with('message', 'File Imported Successfully...');
            } catch (\Exception $e) {
                if ($e->getCode() == 23000) {
                    $errors = [
                        'Duplicate data found. Please check your file and try again.',
                    ];
                    throw ValidationException::withMessages($errors);
                }
            }
        }
    }

    /**
     * Edit users
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $user = auth()->user();
        return view('user.profile', ['user' => $user]);
    }

    /**
     * Update User
     *
     * @param  \App\Http\Requests\UserProfileEditRequest
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserProfileEditRequest $request, $id)
    {
        $this->userService->update($id, $request->only([
            'name',
            'image',
            'age',
            'phone',
            'gender',
            'address',

        ]));

        // Redirect or return a response
        return redirect()->back()->with('success', 'User updated successfully');
    }

    public function editpassword()
    {

        $user = auth()->user();
        return view('user.password')->with('user', $user);
    }

    /**
     * Update User password
     *@param  \App\Http\Requests\ChangePasswordRequest
     * @return \Illuminate\Http\Response
     */
    public function passwordUpdate(ChangePasswordRequest $request)
    {
        $userId = $request->id;

        $user = User::findOrFail($userId);
        $currentPasswordStatus = Hash::check($request->current_password, $user->password);

        if ($currentPasswordStatus && $request->current_password !== $request->password) {
            $this->userService->updatePassword($request, $user);

            return redirect()->route('user.profile')->with('success', 'Password updated successfully');

        } elseif ($currentPasswordStatus && $request->current_password === $request->password) {
            return redirect()->back()->with('message', 'Old Password should not match with new Password');
        } else {
            return redirect()->back()->with('message', 'Current Password does not match with Old Password');
        }
    }

    /**
     * Return send feedback
     * @return void
     */
    public function sendFeedback(UserFeedbackRequest $request)
    {
        $this->userService->send($request->only([
            'message',
        ]));
        return redirect('/')->with('success', 'Thank you for your feedback!');
    }

    public function purchaseHistory()
    {
        $a = 1;
        $i = 0;
        $b = 0;
        $user = Auth::user();
        $user_id = $user->id;
        $members = Member::where('user_id', $user_id)->get();
        $members = Member::where('user_id', $user_id)->with('workout')->get();
        $members = Member::where('user_id', $user_id)->get();
        $m = count($members);
        if ($m <= 0) {
            return view('user.purchaseHistory', compact('m'));
        } else {
            foreach ($members as $d) {
                if ($user_id == $d['user_id']) {
                    $id[$i] = $d['id'];
                    $i++;
                }
            }
            $pur_count = count($id);
            for ($s = 0; $s < $pur_count; $s++) {
                $purchases[] = Payment::where('member_id', $id[$s])->get();
                if ($members[$s]['instructor_id'] == null) {
                    $members[$s]['instructor_id'] == '';
                }
            }
            return view('user.purchaseHistory', compact('user', 'members', 'a', 'purchases', 'b', 'm'));
        }
    }
}
