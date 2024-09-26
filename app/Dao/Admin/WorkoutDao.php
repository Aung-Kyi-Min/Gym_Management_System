<?php

namespace App\Dao\Admin;

use App\Contracts\Dao\Admin\WorkoutDaoInterface;
use App\Models\Workout;

class WorkoutDao implements WorkoutDaoInterface
{
    /**
     * Show Workout
     * @return object
    */
    public function get(): object
    {
        return Workout::orderBy('workouts.created_at', 'desc')->paginate(3);
    }

    /**
     * Show Workout for User
     * @return object
    */
    public function userget(): object
    {
        return Workout::all();
    }

    /**
     * Store Workout
     * @return void
    */
    public function store() : void
    {
        $workout = new Workout();
        $workout->name = request('name');
        $workout->image = request()->file('image')->getClientOriginalName();
        $workout->price = request('price');
        $workout->description = request('description');
        
        $workout->save();
    }

    /**
     * Return Specific Workout
     * @return object
    */
    public function edit($id) : object
    {
        return Workout::findOrFail($id);
    }

    /**
     * Update Workout
     * @return void
    */
    public function update($id , array $data) : void
    {
        $workout = Workout::findOrFail($id);
        
        if ($workout) {
            $workout->name = $data['name'];
            if (isset($data['image']) && $data['image']->isValid()) {
                $workout->image = $data['image']->getClientOriginalName();
            }
            $workout->price = $data['price'];
            $workout->description = $data['description'];
            $workout->save();
        }
    }

    /**
     * Destroy Workout
     * @return void 
    */
    public function destroy($id) : void
    {
        $workout = Workout::findOrFail($id);
        $workout->delete();
    }

    /**
     * search Workout
     * @return object
    */  
    public function search($search): object
    {
        $query = Workout::query();
        if ($search !== "") 
        {
            $query->where('name', 'LIKE', "%$search%")
                ->orWhere('price', 'LIKE', "%$search%")
                ->orWhere('description', 'LIKE', "%$search%");
        }
         return $query->orderBy('created_at', 'asc')
        ->paginate(5)
        ->appends(request()->all());
    }
    
}