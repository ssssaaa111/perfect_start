<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    public  function scopeIncompleted($query){
        return $query->where('isComplete', 0);
    }
}
