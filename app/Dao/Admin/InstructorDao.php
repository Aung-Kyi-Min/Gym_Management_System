<?php
namespace App\Dao\Admin;

use App\Models\Instructor;
use App\Contracts\Dao\Admin\InstructorDaoInterface;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\InstructorsExport;

class InstructorDao implements InstructorDaoInterface
{
    /**
     * Show Instructor
     * @return object
    */
    public function get(): object
    {
        return Instructor::orderBy('instructors.created_at', 'asc')->paginate(5);
    }

    /**
     * Show Instructor for User
     * @return object
    */
    public function userget(): object
    {
        return Instructor::all();
    }

    /**
     * Store Instructor
     * @return void
    */
    public function store() : void
    {
        $instructor = new Instructor();
        $instructor->name = request('name');
        $instructor->email = request('email');
        $instructor->image = request()->file('image')->getClientOriginalName();
        $instructor->speciality = request('speciality');
        $instructor->price = request('price');
        $instructor->access_time = request('access_time');
        $instructor->description = request('description');
        $instructor->save();
        
    }

    /**
     * Return Instructor
     * @return object
    */
    public function edit($id) : object
    {
        return Instructor::findOrFail($id);
    }

    /**
     * Update Instructor
     * @return void
    */
    public function update($id) : void
    {
        $instructor = Instructor::findOrFail($id);
        $instructor->name = request('name');
        $instructor->email= request('email');
        if (request()->hasFile('image')) {
            $instructor->image = request()->file('image')->getClientOriginalName();
        }
        $instructor->speciality= request('speciality');
        $instructor->price = request('price');
        $instructor->access_time = request('access_time');
        $instructor->description = request('description');
        $instructor->save();
    }

    /**
     * Destroy Instructor
     * @return void 
    */
    public function destroy($id) : void
    {
        $instructor=Instructor::findOrFail($id);
        $instructor->delete();
    }

    /**
     * export Instructor
     * @return void 
    */    
    public function export(): object
    {
        //$data = new Excel();
        $data = Excel::download(new InstructorsExport(), 'instructors.xlsx');
        return $data;
    }

    /**
     * search Instructor
     * @return object
    */  
    
        public function search($search): object
    {
        $query =Instructor::query();
        if ($search !== "") 
        {
            $query->where('name', 'LIKE', "%$search%")
            ->orWhere('email', 'LIKE', "%$search%")
            ->orWhere('speciality', 'LIKE', "%$search%")
            ->orWhere('price', 'LIKE', "%$search%")
            ->orWhere('description', 'LIKE', "%$search%")
            ->orWhere(function ($query) use ($search) {
                $query->where('access_time', '=', $search);
            });
        }
    
        return $query->orderBy('created_at', 'asc')
            ->paginate(5)
            ->appends(request()->all());
}

}
