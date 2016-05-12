<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    public function tags() {
        return $this->belongsToMany('\App\Tag')->withTimestamps();
    }

    public function user() {
        return $this->belongsTo('\App\User');
    }

}
