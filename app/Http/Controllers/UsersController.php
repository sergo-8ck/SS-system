<?php

namespace App\Http\Controllers;

use App\Entity\Serials;
use App\Entity\User\User;
use App\Http\Requests\Admin\Users\CreateRequest;
use App\Http\Requests\Admin\Users\UpdateRequest;
use App\Http\Controllers\Controller;
use App\UseCases\Auth\RegisterService;
use Illuminate\Http\Request;

class UsersController extends Controller
{

  public function index(Request $request)
  {
    $query = User::orderByDesc('id');

    if (!empty($value = $request->get('id'))) {
      $query->where('id', $value);
    }

    if (!empty($value = $request->get('name'))) {
      $query->where('name', 'like', '%' . $value . '%');
    }

    if (!empty($value = $request->get('email'))) {
      $query->where('email', 'like', '%' . $value . '%');
    }

    if (!empty($value = $request->get('status'))) {
      $query->where('status', $value);
    }

    if (!empty($value = $request->get('role'))) {
      $query->where('role', $value);
    }

    $users = $query->paginate(20);

    $statuses = [
      User::STATUS_WAIT => 'Waiting',
      User::STATUS_ACTIVE => 'Active',
    ];

    $roles = User::rolesList();

    return view('users.index', compact('users', 'statuses', 'roles'));
  }


  public function show($subdomain_userid)
  {
    $user = User::where('id', $subdomain_userid)->first();
    $serial = User::find($user->id)->serial;
    return view('users.show', compact('user', 'subdomain_userid', 'serial'));
  }


  public function postUser(Request $request, $subdomain_userid)
  {
    if(!auth()->check()){
      return redirect()->route('login');
    }
    request()->validate(['rate' => 'required']);
    $user = User::find($request->id);
    $rating = new \willvincent\Rateable\Rating;
    $rating->rating = $request->rate;
    $rating->user_id = auth()->user()->id;
    $user->ratings()->save($rating);
    return back();

  }

  public function verify(User $user)
  {
    $this->register->verify($user->id);

    return redirect()->route('users.show', $user);
  }
}
