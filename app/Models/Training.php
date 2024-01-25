<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    /**
     * Get the club that owns the training.
     */
    public function club(): BelongsTo
    {
        return $this->belongsTo(Club::class);
    }
}
