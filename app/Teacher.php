<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
     protected $fillable = ['firstname', 'lastname','othername','gender','birthdate','address','city','phone','email','religion','blood_group','password','state_id','status','created_at','updated_at','photo'];
}
