<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Club extends Model
{
    use HasFactory;

    protected $table = 'clubs';

    protected $fillable = [
        'name',
        'address',
        'zip_code',
        'city',
        'latitude',
        'longitude',
        'phone',
        'email',
        'social_network_link',
        'description'
    ];

    /**
     * Get the trainings for a club.
     * Many trainings to One club
     */
    public function trainings(): HasMany
    {
        return $this->hasMany(Training::class);
    }
}
