<?php

namespace App\Http\Controllers;

use App\Http\Router\PagePath;

class PageController extends Controller
{
    public function show(PagePath $path)
    {
        $page = $path->page;

        return view('front.page', compact('page'))
            ->with('description', $page->title)
            ->with('title', $page->description);
    }
}
