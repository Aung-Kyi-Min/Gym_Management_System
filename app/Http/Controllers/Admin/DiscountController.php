<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DiscountRequest;
use App\Contracts\Services\Admin\DiscountServiceInterface;

class DiscountController extends Controller
{
    private $discountService;
 
    /**
      * Create a new controller instance.
      * @param discountInterface $taskServiceInterface
      * @return void
      */
 
    public function __construct(DiscountServiceInterface $discountServiceInterface) 
    {
       $this->discountService = $discountServiceInterface;
    }

    public function get() 
    {
        $discounts = $this->discountService->get();
        return view('admin.discount.discount' , ['discounts' => $discounts]);
    }

    public function create()
    {
        return view('admin.discount.discountCreate');
    }

    public function store(DiscountRequest $request)
    {
       $this->discountService->store($request->only([
          'min_months',
          'max_months',
          'dis_percent',
       ]));
       return redirect('/admin/discount');
    }

    public function edit($id)
    {
        $discount = $this->discountService->edit($id);
        return view('admin.discount.discountEdit' , ['discount' => $discount]);
    }

    public function update(DiscountRequest $request , $id)
    {
       $this->discountService->update($id , $request->only([
          'min_months',
          'max_months',
          'dis_percent',
       ]));
       return redirect('/admin/discount');
    }

    public function destroy($id)
    {
        $this->discountService->destroy($id);
        return redirect('/admin/discount');
    }
}
