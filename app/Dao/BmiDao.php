<?php

namespace App\Dao;

use App\Contracts\Dao\BmiDaoInterface;
use App\Models\Bmi;
use App\Models\BmiRecord;
use Illuminate\Support\Facades\Auth;

class BmiDao implements BmiDaoInterface
{
    /**
     * Store Bmi
     * @return void
    */
    public function store() : void
    {
        $height = request('height');
        $weight = request('weight');

        $bmi = calculateBmi($weight, $height);

        $user = Auth::user();
        $user_id = $user->id;
        $filter = BmiRecord::where('user_id', $user_id)->first();

        if(!$filter) {
            $bmiRecord = new BmiRecord();
            $bmiRecord->user_id = $user_id;
            $bmiRecord->height = request('height');
            $bmiRecord->weight = request('weight');
            $bmiRecord->bmi = $bmi;
            $bmiRecord->save();
        }else {
            $bmiRecord = BmiRecord::where('user_id', $user_id)->first();
            $bmiRecord->user_id = $user_id;
            $bmiRecord->height = request('height');
            $bmiRecord->weight = request('weight');
            $bmiRecord->bmi = $bmi;
            $bmiRecord->save();
        }
    }

}
