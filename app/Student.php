<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
         protected $fillable = ['created_at','updated_at','photo','class_id','section_id','parent_id','app_number','image','division_id','user_id','status'];


        public function classy()
         {
         	 return $this->belongsTo('App\Classes','class_id');
         }

        public function section()
         {
         	 return $this->belongsTo('App\Section','section_id');
         }
        public function user()
	{
	 	 return $this->belongsTo('App\User','user_id');
	}

}
