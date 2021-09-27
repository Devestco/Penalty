<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;
    protected $fillable = [
        'player_id',
        'coach_id',
        'model',
        'model_id',
        'rate',
        'activity_id',
    ];
    public function player():object
    {
        return $this->belongsTo(Player::class);
    }
    public function coach():object
    {
        return $this->belongsTo(Coach::class);
    }
    public function activity():object
    {
        return $this->belongsTo(Activity::class);
    }

}
