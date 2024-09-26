<?php

namespace App\Dao\Admin;

use App\Contracts\Dao\Admin\DiscountDaoInterface;
use App\Models\Discount;

class DiscountDao implements DiscountDaoInterface
{
    /**
     * Show discount
     * @return object
    */
    public function get(): object
    {
        return Discount::all();
    }

    /**
     * Store discount
     * @return void
    */
    public function store() : void
    {
        $discount = new Discount();
        $discount->min_months = request('min_months');
        $discount->max_months = request('max_months');
        $discount->dis_percent = request('dis_percent');
        
        $discount->save();
    }

    /**
     * Return Specific Discount
     * @return object
    */
    public function edit($id) : object
    {
        return Discount::findOrFail($id);
    }

    /**
     * Update discount
     * @return void
    */
    public function update($id , array $data) : void
    {
        $discount = Discount::findOrFail($id);
        if ($discount) {
            $discount->min_months = $data['min_months'];
            $discount->max_months = $data['max_months'];
            $discount->dis_percent = $data['dis_percent'];
            $discount->save();
        }
    }

     /**
     * Destroy discount
     * @return void 
    */
    public function destroy($id) : void
    {
        $discount = Discount::findOrFail($id);
        $discount->delete();
    }
}