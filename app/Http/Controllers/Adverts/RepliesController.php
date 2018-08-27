<?php

namespace App\Http\Controllers\Adverts;

use Illuminate\Http\Request;
use App\Entity\Adverts\Advert\Advert;
use App\Http\Controllers\Controller;

class RepliesController extends Controller
{

  /**
   * Create a new RepliesController instance.
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Persist a new reply.
   *
   * @param  Thread $thread
   * @return \Illuminate\Http\RedirectResponse
   */
  public function store(Advert $advert)
  {
    $advert->addReply([
      'body' => request('body'),
      'user_id' => auth()->id()
    ]);
    return back();
  }

}
