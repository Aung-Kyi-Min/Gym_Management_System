<?php

namespace App\Services\Admin;

use App\Contracts\Dao\Admin\AdminDaoInterface;
use App\Contracts\Services\Admin\AdminServiceInterface;
use Maatwebsite\Excel\Excel;
use App\Exports\UsersExport;

class AdminService implements AdminServiceInterface
{

    private $adminDao;

    public function __construct(AdminDaoInterface $adminDao)
    {
        $this->adminDao = $adminDao;
    }

    /**
    * export Instructor
    * @return object
    */ 
    public function exportuser(): object
    {
        $users = $this->adminDao->exportuser();
        return $users;
    }

     /**
     * Show Workout
     * @return object
    */
    public function feedback(): object
    {
        return $this->adminDao->feedback();
    }

}
