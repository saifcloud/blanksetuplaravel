<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Foundation\Auth\User as Authenticatable;

class Setting extends Model
{
    
        //
      const CREATED_AT = 'CreatedAt';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'updatedAt';
    
    
    
      protected $fillable = ['field_key'];
   

    //   protected $hidden = [
    //     'password', 'remember_token',
    // ];


}





