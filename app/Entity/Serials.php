<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Serials extends Model
{
  public $timestamps = false;

  protected $fillable = [
    'user_id', 'serial'
  ];


}
