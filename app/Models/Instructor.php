<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'speciality',
        'image',
        'email',
        'price',
        'access_time',
        'description',
    ];

    public function member()
    {
        return $this->hasMany(Member::class);
    }
    
}
