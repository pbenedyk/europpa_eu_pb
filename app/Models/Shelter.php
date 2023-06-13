<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shelter extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city',
        'street',
        'house_number',
        'zip',
        'phone',
        'email',
    ];
}
