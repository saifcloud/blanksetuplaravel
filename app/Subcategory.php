<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    //

    public function category()
    {
    	return $this->belongsTo('App\Category','category_id');
    }

    // public function pack()
    // {
    // 	// return $this->hasMany('App\Pack');
    // }

        public function pack()
        {
        return $this->hasMany('App\Pack','subcategory_id','id')->where('status',1)->where('is_deleted',0);
        }
        
         public function subcategory_pack()
        {
        return $this->hasMany('App\Subcategory_pack','subcategory_id','id')->where('status',1)->where('is_deleted',0);
        }
}
