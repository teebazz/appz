<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
         protected $fillable = ['firstname', 'lastname','othername','gender','birthdate','address','city','phone','email','religion','blood_group','password','state_id','status','created_at','updated_at','photo','class_id','section_id','parent_id','app_number','image','division_id'];


         public function classy()
         {
         	 return $this->belongsTo('App\Classes','class_id');
         }

         public function section()
         {
         	 return $this->belongsTo('App\Section','section_id');
         }

}
