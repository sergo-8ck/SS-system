<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
  public function index($subdomain_userid)
  {
    if($subdomain_userid == auth()->user()->id){
      return view('cabinet.home', ['subdomain_userid' => $subdomain_userid]);
    }
    return redirect()->route('home');
  }
}
