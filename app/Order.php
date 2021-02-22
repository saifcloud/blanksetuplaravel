<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
      const CREATED_AT = 'CreatedAt';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'updatedAt';


    public function category(){
    	return $this->hasOne('App\Category','id','category_id');
    }
    
     public function pd_size(){
      return $this->hasOne('App\Size','id','size');
    }
    
    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }
}
