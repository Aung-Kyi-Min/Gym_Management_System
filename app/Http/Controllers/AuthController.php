<?php

namespace App\Http\Controllers;

use App\Contracts\Services\AuthServiceInterface;
use App\Http\Requests\ForgetPswRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterCreateRequest;
use App\Http\Requests\ResetPswRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    private $authService;

    /**
     * @param AuthServiceInterface $authServiceInterface
     * @return void
     */

    public function __construct(AuthServiceInterface $AuthServiceInterface)
    {
        $this->authService = $AuthServiceInterface;
    }

    public function login()
    {
        if (!Auth::guest()) {
            return redirect()->route('user.index');
        }
        return view('auth.login');
    }

    public function registerUser(RegisterCreateRequest $request)
    {
        $this->authService->register($request->only([
            'name',
            'email',
            'password',
            'role',
            'image',
            'address',
            'gender',
            'age',
            'phone',
        ]));
        if (request()->hasFile('image')) {
            $name = request()->file('image')->getClientOriginalName();
            request()->file('image')->storeAs('public/images/admin/user', $name);
        }
        return redirect()->route('auth.login')
        ->with('message', 'Your have Registered Successfully...');

    }

    public function LoginUser(LoginRequest $request)
    {
        $credentials = [
            'email' => $request['email'],
            'password' => $request['password'],
        ];

        $user = User::where('email', $request['email'])->first();

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('token')->plainTextToken;
            if ($user->role == 0) {
                return redirect()->route('admin.index')
                    ->with('message', 'You Have Successfully logined...')
                    ->with('token', $token);
            } else
            {
                return redirect()->route('user.index')
                    ->with('message', 'You Have Successfully logined...')
                    ->with('token', $token);
            }
        } else {
            return back()->withErrors(['email' => 'Invalid email or password']);
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitForgetPasswordForm(ForgetPswRequest $request)
    {
        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        Mail::send('email.forgetPassword', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('message', 'We have e-mailed your password reset link!');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitResetPasswordForm(ResetPswRequest $request)
    {
        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token,
            ])
            ->first();

        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();

        return redirect()
            ->route('auth.login')
            ->with('change', 'Your password has been changed!');
    }

    public function register()
    {
        if (!Auth::guest()) {
            return redirect()->route('user.index');
        }

        return view('Auth.register');
    }

    public function forgetpassword()
    {
        if (!Auth::guest()) {
            return redirect()->route('user.index');
        }

        return view('Auth.forgetpassword');
    }

    public function reset($token)
    {
        if (!Auth::guest()) {
            return redirect()->route('user.index');
        }

         return view('Auth.reset', ['token' => $token]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('message', 'U have logged out Successfully...');
    }

}
