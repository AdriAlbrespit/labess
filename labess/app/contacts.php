<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contacts extends Model
{
    protected $fillable = [
    'name',
    'tel',
    'email',
    'message'
  ];

}
