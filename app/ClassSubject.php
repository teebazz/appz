<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassSubject extends Model
{
    protected $table = 'class_subject';

    protected $fillable = ['class_id','subject_id','teacher_id'];

    public function classs()
	{
	 	 return $this->belongsTo('App\Classes','class_id');
	}

	public function subject()
	{
	 	 return $this->belongsTo('App\Subject','subject_id');
	}
}
