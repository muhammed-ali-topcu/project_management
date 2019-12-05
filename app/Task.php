<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable=['title','last_date', 'completed'];
    public function project(){
        return $this->belongsTo('App\Project');
    }
}
