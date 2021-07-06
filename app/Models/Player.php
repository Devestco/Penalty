<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'birth_date',
        'nationality',
        'nationality_id',
        'ad_id',
    ];

    public function user():object
    {
        return $this->belongsTo(User::class);
    }
    public function ad():object
    {
        return $this->belongsTo(Ad::class);
    }
}
