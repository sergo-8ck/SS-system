<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

  public static function getAppDomain()
  {
    return (!in_array(\App::environment(), ['local', 'production']) ? \App::environment() . '.' : '') . 'app.' . config('app.domain');
  }

  public static function getAppUrl($path = '', $secure = false)
  {
    return ($secure ? 'https' : 'http') . '://' . static::getAppDomain() . ($path ? '/' . $path : '');
  }
}
