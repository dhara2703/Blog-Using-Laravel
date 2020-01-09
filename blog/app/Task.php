<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    // Helps to get list of all incomplete tasks
    // public static function incomplete()
    // {
            //// return false;
    //     return static::where('completed', 0)->get();
    // }


    // Helps to get list of all complete tasks
    // public static function complete()
    // {
    //     return static::where('completed', 1)->get();
    // }

    // The prefixed word scope will work s a query scope.
    // public function scopeIncomplete($query, $val) Task::incomplete('with any argument')  
    public function scopeIncomplete($query) // Task::incomplete() The prefixed word scope will work s a query scope.
    {
        return $query->where('completed', 0);
    }
}
