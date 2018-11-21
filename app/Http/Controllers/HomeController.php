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
          ->with('description', 'Lara - Главная страница')
          ->with('title', 'Lara - Главная страница');
    }
}
