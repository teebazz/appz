<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
     protected $fillable = ['name', 'class_id', 'teacher_id', 'status'];

    
    public function classs()
    {
        return $this->belongsTo('App\Classes','class_id');
    }

    public function student()
    {
    	return $this->hasOne('App\Student');
    }
}
