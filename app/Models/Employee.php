<?php

namespace App\Models;

use App\Enums\StatusEmployee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'status_kepegawaian' => StatusEmployee::class,
    ];
}
