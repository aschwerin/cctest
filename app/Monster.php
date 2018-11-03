<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monster extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'class', 'level', 'race', 'alignment', 'exp', 'str', 'dex', 'con',
        'int', 'wis', 'cha', 'armor', 'initiative', 'speed', 'hit_points', 'equipment', 'other_proficiencies_langs',
        'notes'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'image_name', 'image_path'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
