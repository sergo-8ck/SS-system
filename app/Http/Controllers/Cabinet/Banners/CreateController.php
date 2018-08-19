<?php

namespace App\Http\Controllers\Cabinet\Banners;

use App\Entity\Adverts\Category;
use App\Entity\Banner\Banner;
use App\Entity\Region;
use App\Http\Controllers\Controller;
use App\Http\Requests\Banner\CreateRequest;
use App\UseCases\Banners\BannerService;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    private $service;

    public function __construct(BannerService $service)
    {
        $this->service = $service;
    }

    public function category($subdomain_userid)
    {
        $categories = Category::defaultOrder()->withDepth()->get()->toTree();

        return view('cabinet.banners.create.category', compact('categories', 'subdomain_userid'));
    }

    public function region($subdomain_userid, Category $category, Region $region = null)
    {
        $regions = Region::where('parent_id', $region ? $region->id : null)->orderBy('name')->get();

        return view('cabinet.banners.create.region', compact('category', 'region', 'regions', 'subdomain_userid'));
    }

    public function banner($subdomain_userid, Category $category, Region $region = null)
    {
        $formats = Banner::formatsList();

        return view('cabinet.banners.create.banner', compact('category', 'region', 'formats', 'subdomain_userid'));
    }

    public function store(CreateRequest $request, $subdomain_userid, Category $category, Region $region = null)
    {
        try {
            $banner = $this->service->create(
                Auth::user(),
                $category,
                $region,
                $request
            );
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('cabinet.banners.show', [$subdomain_userid, $banner]);
    }
}
