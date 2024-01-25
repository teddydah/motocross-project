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
        'track',
        'vehicle',
        'license_type',
        'length',
        'width',
        'address',
        'zip_code',
        'city',
        'latitude',
        'longitude',
        'description',
        'club_id'
    ];
}
