<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    public function sections()
    {
        return $this->hasMany('App\Models\sections');
    }
}
