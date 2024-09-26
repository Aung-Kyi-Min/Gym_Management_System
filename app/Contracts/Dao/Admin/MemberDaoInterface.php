<?php

namespace App\Contracts\Dao\Admin;

/**
 * Interface of Data Access Object for instructor
 */
interface MemberDaoInterface
{
    /**
     * Show Member
     * @return object
    */
    public function get() : object;

    /**
     * Show Payment
     * @return object
    */
    public function paymentsget() : object;

    /**
     * Destroy Member
     * @return void 
    */
    public function destroy($id) : void;
    
    /**
     * Search Member
     * @return void 
    */
    public function search($search): object;
}