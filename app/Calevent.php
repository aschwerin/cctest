<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calevent extends Model
{
    protected $user_id;
    protected $fillable = ['title', 'description', 'start', 'end', 'all_day'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
