<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

        protected $fillable = [
        'member_id',
        'amount',
        'payment',
    ];
//
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

}
