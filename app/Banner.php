<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    //
     const CREATED_AT = 'CreatedAt';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'updatedAt';

    // public function subcategories()
    // {
    // 	return $this->hasMany('App\Subcategory','category_id','id')->where('status',1)->where('is_deleted',0);
    // }


    //  public function packs()
    // {
    // 	return $this->hasMany('App\Pack','category_id','id');

    // }

    //  public function pack() 
    //     {
    //     	return $this->hasManyThrough('App\Pack','App\Subcategory');
    //     }
   
}
