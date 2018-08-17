<?php

use App\Entity\Adverts\Category;
use App\Entity\Page;
use App\Entity\Region;
use App\Http\Router\AdvertsPath;
use App\Http\Router\PagePath;

if (! function_exists('adverts_path')) {

    function adverts_path(?Region $region, ?Category $category)
    {
        return app()->make(AdvertsPath::class)
            ->withRegion($region)
            ->withCategory($category);
    }
}

if (! function_exists('page_path')) {

    function page_path(Page $page)
    {
        return app()->make(PagePath::class)
            ->withPage($page);
    }
}

  if (! function_exists('route')) {
    /**
     * Generate the URL to a named route.
     *
     * @param  array|string  $name
     * @param  mixed  $parameters
     * @param  bool  $absolute
     * @return string
     */
    function route($name, $parameters = [], $absolute = true)
    {
      if(auth()->check()){
        if(empty($parameters)){
          return app('url')->route($name, auth()->user()->id, $absolute);
        }
        return app('url')->route($name, $parameters, $absolute);
      }
      if(!auth()->check()){
        if(empty($parameters)){
          return app('url')->route($name, 2, $absolute);
        }
        return app('url')->route($name, $parameters, $absolute);
      }
    }
  }