<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'sport_id',
    ];

    public function user():object
    {
        return $this->belongsTo(User::class);
    }
    public function sport():object
    {
        return $this->belongsTo(Sport::class);
    }
}
