<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $guarded = ['*'];


    public function user(){
        return $this->hasOne(User::class,'id','student_id');
    }

    public function department(){
        return $this->hasOne(Department::class,'id','department_id');
    }

    public function course(){
        return $this->hasOne(Course::class,'id','course_id');
    }

    public function users(){
        return $this->belongsTo('App\User');
    }
}
