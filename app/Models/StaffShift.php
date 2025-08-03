<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffShift extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'shift_date',
        'start_time',
        'end_time',
        'status'
    ];

    protected $casts = [
        'shift_date' => 'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
