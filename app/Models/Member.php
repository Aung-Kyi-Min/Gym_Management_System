<?php

namespace App\Models;

use App\Models\Instructor;
use App\Models\User;
use App\Models\Workout;
use Faker\Provider\Payment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'workout_id',
        'instructor_id',
        'sub_month',
        'joining_date',
        'end_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function workout()
    {
        return $this->belongsTo(Workout::class);
    }

        public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function payment()
    {
        return $this->hasMany(Payment::class);
    }

}
