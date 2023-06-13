<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'email',
        'phone',
        'position',
        'hire_date',
        'shelter_id',
    ];

    public function shelter()
    {
        return $this->belongsTo(Shelter::class);
    }
}
