<?php
namespace App\Services\Admin;

use App\Contracts\Dao\Admin\InstructorDaoInterface;
use App\Contracts\Services\Admin\InstructorServiceInterface;
use Maatwebsite\Excel\Excel;
use App\Exports\InstructorsExport;

class InstructorService implements InstructorServiceInterface
{

   /**
     * Instructor Dao
     */
    private $instructorDao;

    /**
     * Class Instructor
     * @param InstructorDaoInterface
     * @return void
     */
    public function __construct(InstructorDaoInterface $instructorDao)
    {
        $this->instructorDao = $instructorDao;
    }

    /**
     * Show Instructor
     * @return object
    */
    public function get() : object
    {
        return $this->instructorDao->get();
    }

    /**
     * Show Workout for User
     * @return object
    */
    public function userget(): object
    {
        return $this->instructorDao->userget();
    }

    /**
     * Store Instructor
     * @return void
    */
    public function store() : void
    {
        $this->instructorDao->store();
        $name = request()->file('image')->getClientOriginalName();
        request()->file('image')->storeAs('public/images/admin/instructor' , $name);  
    }

     /**
     * Return Instructor
     * @return object
    */
    public function edit($id) : object
    {
        return $this->instructorDao->edit($id);
    }

    /**
     * Update Instructor
     * @return void
    */
    public function update($id) : void
    {
        if (request()->hasFile('image')) {
            $name = request()->file('image')->getClientOriginalName();
            request()->file('image')->storeAs('public/images/admin/instructor', $name);
        }
        $this->instructorDao->update($id);
    }

     /**
     * Destroy Instructor
     * @return void 
    */
    public function destroy($id) : void
    {
        $this->instructorDao->destroy($id);
    }

     /**
    * export Instructor
    * @return object
    */
    public function export(): object
    {
        $data = $this->instructorDao->export();
        return $data;
    }

    /**
    * search Instructor
    * @return object
    */  
    public function search($search): object
    {
       return  $this->instructorDao->search($search);
    }

}
