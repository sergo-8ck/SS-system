<?php

namespace App\Http\Controllers;

use App\Entity\Adverts\Category;
use App\Entity\Region;

class HomeController extends Controller
{
    public function index()
    {
        $regions = Region::roots()->orderBy('name')->getModels();

        $categories = Category::whereIsRoot()->defaultOrder()->getModels();

        return view('front/index', compact('regions', 'categories'))
          ->with('description', config('app.name') . ' - Главная')
          ->with('title', config('app.name') . ' - Главная');
    }
}
