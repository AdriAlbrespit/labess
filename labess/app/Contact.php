<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';

    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';

    protected $attributes = [
    	'tel' => 0000000000,
    ];

}
