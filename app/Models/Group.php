<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'academy_id',
        'sport_id',
        'price',
        'days',
    ];

    protected $casts = [
        'days' => 'array',
    ];

    public function sport():object
    {
        return $this->belongsTo(Sport::class);
    }
    public function academy():object
    {
        return $this->belongsTo(Academy::class);
    }
}
