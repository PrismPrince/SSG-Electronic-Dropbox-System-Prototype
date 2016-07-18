<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function options() {
        return $this->belongsToMany(Option::class);
    }

    public function suggestions() {
        return $this->hasMany(Suggestion::class);
    }
}
