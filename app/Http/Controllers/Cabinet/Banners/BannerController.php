<?php

namespace App\Http\Controllers\Cabinet\Banners;

use App\Entity\Banner\Banner;
use App\Http\Controllers\Controller;
use App\Http\Requests\Banner\EditRequest;
use App\Http\Requests\Banner\FileRequest;
use App\UseCases\Banners\BannerService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class BannerController extends Controller
{
    private $service;

    public function __construct(BannerService $service)
    {
        $this->service = $service;
    }
    
    public function index($subdomain_userid)
    {
        $banners = Banner::forUser(Auth::user())->orderByDesc('id')->paginate(20);

        return view('cabinet.banners.index', compact('banners', 'subdomain_userid' ));
    }

    public function show($subdomain_userid, Banner $banner)
    {
        $this->checkAccess($banner);
        return view('cabinet.banners.show', compact('banner', 'subdomain_userid'));
    }

    public function editForm($subdomain_userid, Banner $banner)
    {
        $this->checkAccess($banner);
        if (!$banner->canBeChanged()) {
            return redirect()->route('cabinet.banners.show', compact('banner', 'subdomain_userid'))->with('error', 'Unable to edit.');
        }
        return view('cabinet.banners.edit', compact('banner', 'subdomain_userid'));
    }

    public function edit(EditRequest $request, $subdomain_userid, Banner $banner)
    {
        $this->checkAccess($banner);
        try {
            $this->service->editByOwner($banner->id, $request);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('cabinet.banners.show', compact('subdomain_userid','banner'));
    }

    public function fileForm($subdomain_userid, Banner $banner)
    {
        $this->checkAccess($banner);
        if (!$banner->canBeChanged()) {
            return redirect()->route('cabinet.banners.show', $banner)->with('error', 'Unable to edit.');
        }
        $formats = Banner::formatsList();
        return view('cabinet.banners.file', compact('banner', 'formats', 'subdomain_userid'));
    }

    public function file(FileRequest $request, $subdomain_userid, Banner $banner)
    {
        $this->checkAccess($banner);
        try {
            $this->service->changeFile($banner->id, $request);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('cabinet.banners.show', compact('banner', 'subdomain_userid'));
    }

    public function send($subdomain_userid, Banner $banner)
    {
        $this->checkAccess($banner);
        try {
            $this->service->sendToModeration($banner->id);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('cabinet.banners.show', compact('banner', 'subdomain_userid'));
    }

    public function cancel($subdomain_userid, Banner $banner)
    {
        $this->checkAccess($banner);
        try {
            $this->service->cancelModeration($banner->id);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('cabinet.banners.show', compact('banner', 'subdomain_userid'));
    }

    public function order($subdomain_userid, Banner $banner)
    {
        $this->checkAccess($banner);
        try {
            $banner = $this->service->order($banner->id);
            $url = $this->robokassa->generateRedirectUrl($banner->id, $banner->cost, 'banner');
            return redirect($url);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('cabinet.banners.show', compact('banner', 'subdomain_userid'));
    }

    public function destroy($subdomain_userid, Banner $banner)
    {
        $this->checkAccess($banner);
        try {
            $this->service->removeByOwner($banner->id);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('cabinet.banners.index', $subdomain_userid);
    }

    private function checkAccess(Banner $banner): void
    {
        if (!Gate::allows('manage-own-banner', $banner)) {
            abort(403);
        }
    }
}
