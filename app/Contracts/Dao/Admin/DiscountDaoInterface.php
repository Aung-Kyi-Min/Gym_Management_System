<?php

namespace App\Contracts\Dao\Admin;

/**
 * Interface of Data Access Object for task
 */
interface DiscountDaoInterface
{
    /**
     * Show discount
     * @return object
    */
    public function get(): object;
    
    /**
     * Store discount
     * @return void
    */
    public function store() : void;

     /**
     * Return Specific Discount
     * @return object
    */
    public function edit($id) : object;

    /**
     * Update discount
     * @return void
    */
    public function update($id , array $data) : void;

     /**
     * Destroy discount
     * @return void 
    */
    public function destroy($id) : void;
}