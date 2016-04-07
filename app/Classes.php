<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $fillable = ['name', 'order','status','division_id'];

    protected $table = 'classes';

    public function section()
    {
        return $this->hasMany('App\Section');
    }

    public function student()
    {
    	return $this->hasOne('App\Student');
    }

    public function classSubject()
    {
        return $this->hasMany('App\ClassSubject');
    }
}

