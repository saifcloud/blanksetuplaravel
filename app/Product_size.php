<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_size extends Model
{
    //
      
      const CREATED_AT = 'CreatedAt';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'updatedAt';



    public function sizes(){
    	return $this->HasOne('App\Size','id','size_id');
    }
}
