<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Contracts\Services\Admin\UserServiceInterface;

class UsersController extends Controller
{

   private $userService;
 
    /**
      * Create a new controller instance.
      * @param userInterface $taskServiceInterface
      * @return void
      */
 
    public function __construct(UserServiceInterface $userServiceInterface) 
    {
       $this->userService = $userServiceInterface;
    }

    public function create()
    {
        $loginuser = auth()->user();
        return view('admin.user.userCreate' , ['loginuser' => $loginuser]);
    }

    /**
     * Show User
     * @return object
    */
    public function user(Request $request)
    {
        $loginuser = auth()->user();
        $search = $request->input('search', '');
        $users_search = $this->userService->search($search);
    
        foreach ($users_search as $user) {
            $user->limitedAddress = Str::limit($user->address, 50);
        }
    
        return view('admin.user.user', compact('users_search', 'search' , 'loginuser'));
    }
    
    /**
     * Store User
     * @return void
    */
    public function store(UserCreateRequest $request) 
    {
        $this->userService->store($request->only([
            'name',
            'email',
            'password',
            'phone',
            'gender',
            'age',
            'role',
            'image',
            'address'
        ]));
        return redirect('/admin/user');
    }

     /**
     * Return Specific User
     * @return object
    */
    public function edit($id) 
    {
        $loginuser = auth()->user();
        $user = $this->userService->edit($id);
        return view('admin.user.userEdit' ,['user' => $user , 'loginuser' => $loginuser]);
    }

    /**
     * Update User
     * @return void
    */
    public function update(UserEditRequest $request ,$id)
    {
        $this->userService->update($id , $request->only([
            'name',
            'phone',
            'gender',
            'age',
            'role',
            'image',
            'address'
        ]));
        
        return redirect('/admin/user');
    }

    public function editpassword($id)
    {
        $user = $this->userService->editPassword($id);
        return view ('admin.user.password', ['user' => $user]);
    }

    public function passwordUpdate(ChangePasswordRequest $request)
    {
        $userId = $request->id;

        $user = User::findOrFail($userId);
        $currentPasswordStatus = Hash::check($request->current_password, $user->password);

        if ($currentPasswordStatus && $request->current_password !== $request->password) 
        {
            $this->userService->passUpdate($request, $user);

            return redirect()->back()->with('success', 'Password updated successfully');

        } elseif ($currentPasswordStatus && $request->current_password === $request->password)
        {
            return redirect()->back()->with('message', 'Old Password should not match with new Password');
        } 
        else 
        {
            return redirect()->back()->with('message', 'Current Password does not match with Old Password');
        }
    }
  
    /**
     * Destroy User
     * @return void 
    */
    public function destroy($id) 
    {
        $this->userService->destroy($id);
        return redirect('/admin/user');
    }

}
