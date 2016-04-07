<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{

    protected $fillable = ['name','status','division_id'];

    public function division()
    {
    	 return $this->belongsTo('App\Division','division_id');
    }

    public function subject()
    {
    	return $this->belongsTo('App\ClassSubject','subject_id');
    }

    public function classSubject()
    {
        return $this->hasMany('App\ClassSubject');
    }
}
