<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'academy_id',
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
    public function academy():object
    {
        return $this->belongsTo(Academy::class);
    }

    public function days()
    {
        return $this->hasMany(CourseDay::class,'course_id','id');
    }

    public function players()
    {
        return $this->belongsToMany(Player::class, "course_player", "player_id", "course_id");
    }
    public function coaches()
    {
        return $this->belongsToMany(Coach::class, "course_coach", "coach_id", "course_id");
    }
}
