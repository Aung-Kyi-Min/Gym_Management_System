<?php

namespace App\Contracts\Services\Admin;

/**
 * Interface for instructor service
*/
interface MemberServiceInterface
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