<?php

namespace App\Services\Admin;

use App\Contracts\Dao\Admin\DiscountDaoInterface;
use App\Contracts\Services\Admin\DiscountServiceInterface;

class DiscountService implements DiscountServiceInterface
{
    /**
    * discount Dao
    */
    private $discountDao;

    /**
    * Class Constructor
    * @param discountDaoInterface
    * @return void
    */
    public function __construct(DiscountDaoInterface $discountDao)
    {
        $this->discountDao = $discountDao;
    }

    /**
     * Show discount
     * @return object
    */
    public function get(): object
    {
       return $this->discountDao->get();
    }

    /**
     * Store discount
     * @return void
    */
    public function store() : void
    {
        $this->discountDao->store();
    }

    /**
     * Return Specific Discount
     * @return object
    */
    public function edit($id) : object
    {
        return $this->discountDao->edit($id);
    }

    /**
     * Update discount
     * @return void
    */
    public function update($id , array $data) : void
    {
        $this->discountDao->update($id , $data);
    }

     /**
     * Destroy discount
     * @return void 
    */
    public function destroy($id) : void
    {
        $this->discountDao->destroy($id);
    }
}