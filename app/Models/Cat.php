<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'breed',
        'birth_date',
        'death_date',
        'is_vaccinated',
        'is_adoption_available',
        'shelter_id',
    ];

    public function shelter()
    {
        return $this->belongsTo(Shelter::class);
    }
}
