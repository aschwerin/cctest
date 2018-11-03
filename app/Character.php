<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'class', 'level', 'race', 'background', 'alignment', 'exp', 'str', 'dex', 'con',
        'int', 'wis', 'cha', 'inspiration', 'armor', 'initiative', 'speed', 'hit_points', 'personality_traits',
        'ideals', 'bonds', 'flaws', 'equipment', 'other_proficiencies_langs', 'notes'];

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
