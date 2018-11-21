<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public function chapter()
    {
        return $this->belongsTo('App\Models\chapter');
    }
}
