<?php

namespace App\Entity\Adverts\Advert;

use App\Entity\User\User;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
  /**
   * Don't auto-apply mass assignment protection.
   *
   * @var array
   */
  protected $guarded = [];

  /**
   * A reply has an owner.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */

  public function owner()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
}
