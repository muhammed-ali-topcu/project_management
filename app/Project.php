<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable=['name','description'];
  
    public function tasks(){
        return $this->hasMany('App\Task');
    }
    public function add_task(Task $task ){
        $task->project_id= $this->id;
        $task->save();
    }
}
