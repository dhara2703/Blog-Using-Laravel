<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    // Video 11 - The fillable varible makes sure that only this values will be assigned to mass assignment
    // fillable accepts this parameters and whitelist them
    // protected $fillable = ['title', 'body']; 


    // Opp of fillable - it will make sure that the given parameter will not be allowed to store in database, 
    //                   other than thaat all other parameters will be stored
    // protected $guarded = ['user_id'];

    protected $guarded = [];

}
