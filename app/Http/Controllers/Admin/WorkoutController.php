<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\WorkoutRequest;
use App\Http\Requests\WorkoutEditRequest;
use App\Contracts\Services\Admin\WorkoutServiceInterface;

class WorkoutController extends Controller
{
   private $workoutService;
 
    /**
      * Create a new controller instance.
      * @param WorkoutInterface $taskServiceInterface
      * @return void
      */
 
    public function __construct(WorkoutServiceInterface $workoutServiceInterface) 
    {
       $this->workoutService = $workoutServiceInterface;
    }

    /**
     * Create Workout
     * @return void
    */
    public function create()
    {
      $loginuser = auth()->user();
      return view('admin.workout.workoutCreate' , ['loginuser' => $loginuser]);
    }
    
    /**
     * Show Workout
     * @return object
    */
    public function workout(Request $request)
    {
      $loginuser = auth()->user();
      $search = $request->input('search', '');
      $workouts = $this->workoutService->search($search);
        
        foreach ($workouts as $workout) 
        {
            $workout->limitedDescription =Str::limit($workout->description, 40);
        }
        
        return view('admin.workout.workout', compact('workouts', 'search' , 'loginuser'));
    }

    /**
      * Store Workout
      * @return void
     */
    public function store(WorkoutRequest $request)
    {
       $this->workoutService->store($request->only([
          'name',
          'price',
          'image',
          'description',
       ]));
       return redirect('/admin/workout');
    }
    
     /**
     * Return Specific Workout
     * @return object
    */
    public function edit($id)
    { 
      $loginuser = auth()->user();
      $workout = $this->workoutService->edit($id);
      return view('admin.workout.workoutEdit' , ['workout' => $workout , 'loginuser' => $loginuser]);
    }
    
    /**
     * Update Workout
     * @return void
    */
    public function update(WorkoutEditRequest $request ,$id)
    {
       $this->workoutService->update($id , $request->only([
          'name',
          'price',
          'image',
          'description',
       ]));
       return redirect('/admin/workout');
    }
    
    /**
     * Destroy Workout
     * @return void 
    */
    public function destroy($id) 
    {
       $this->workoutService->destroy($id);
       return redirect('/admin/workout');
    }

 }