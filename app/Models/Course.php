<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'sport_id',
        'from_date',
        'to_date',
        'price',
        'days',
    ];

    protected $casts = [
        'days' => 'array',
        'from_date' => 'date',
        'to_date' => 'date',
    ];

    public function sport():object
    {
        return $this->belongsTo(Sport::class);
    }
}
