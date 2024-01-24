<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $table = 'trainings';

    protected $fillable = [
        'name',
        'max_people',
        'type',
        'price',
        'length',
        'width',
        'address',
        'zip_code',
        'city',
        'latitude',
        'longitude',
        'description'
    ];
}
