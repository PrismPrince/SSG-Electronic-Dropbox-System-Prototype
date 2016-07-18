<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    public function survey() {
        return $this->belongsTo(Survey::class);
    }

    public function students() {
        return $this->belongsToMany(Student::class);
    }
}
