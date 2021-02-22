<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
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
    	return $this->HasOne('App\Category','id','category_id');
    }

    public function size_of_product(){
        return $this->HasOne('App\Size','id','product_size');
    }
}
