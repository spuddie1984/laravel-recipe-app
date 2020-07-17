<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipes extends Model
{

    //Belongs to Relation
    public function user() {

        return $this->belongsTo('App\User');

    }
}
