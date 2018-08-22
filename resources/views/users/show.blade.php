@extends('layouts.app')

@section('content')
  @include('users._nav')



  <table class="table table-bordered table-striped">
    <tbody>
    <tr>
      <th>ID</th>
      <td>{{ $user->id }}</td>
    </tr>
    <tr>
      <th>Name</th>
      <td>{{ $user->name }}</td>
    </tr>
    <tr>
      <th>Email</th>
      <td>{{ $user->email }}</td>
    </tr>
    <tr>
      <th>Status</th>
      <td>
        @if ($user->isWait())
          <span class="badge badge-secondary">Waiting</span>
        @endif
        @if ($user->isActive())
          <span class="badge badge-primary">Active</span>
        @endif
      </td>
    </tr>
    <tr>
      <th>Role</th>
      <td>
        @if ($user->is))
        <span class="badge badge-danger"></span>
        @else
          <span class="badge badge-secondary">User</span>
        @endif
      </td>
    </tr>
    <tbody>
    </tbody>
  </table>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <form action="{{ route('sub.userid.post') }}" method="POST">
              {{ csrf_field() }}
              <div class="rating">
                <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="{{ $user->averageRating }}" data-size="xs">
                <input type="hidden" name="id" required="" value="{{ $user->id }}">
                <button class="btn btn-success">Сохранить</button>
              </div>
            </form>
          </div>
        </div>
        <h3>
          Серийный номер - {{ $serial->serial }}
        </h3>
      </div>
    </div>
  </div>


  {{--<div class="container">--}}
  {{--<div class="row">--}}
  {{--<div class="col-md-12">--}}
  {{--<div class="panel panel-default">--}}
  {{--<div class="panel-heading">Users</div>--}}
  {{--<div class="panel-body">--}}
  {{--<table class="table table-bordered">--}}
  {{--<tr>--}}
  {{--<th>Id</th>--}}
  {{--<th>Name</th>--}}
  {{--<th width="400px">Star</th>--}}
  {{--<th width="100px">View</th>--}}
  {{--</tr>--}}
  {{--@if($users->count())--}}
  {{--@foreach($users as $user)--}}
  {{--<tr>--}}
  {{--<td>{{ $user->id }}</td>--}}
  {{--<td>{{ $user->name }}</td>--}}
  {{--<td>--}}
  {{--<input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5"--}}
  {{--data-step="0.1" value="{{ $user->averageRating }}" data-size="xs" disabled="">--}}
  {{--</td>--}}
  {{--<td>--}}
  {{--<a href="{{ route('posts
                       .show',$user->id) }}" class="btn btn-primary btn-sm">View</a>--}}
  {{--</td>--}}
  {{--</tr>--}}
  {{--@endforeach--}}
  {{--@endif--}}
  {{--</table>--}}
  {{--</div>--}}
  {{--</div>--}}
  {{--</div>--}}
  {{--</div>--}}
  {{--</div>--}}
  {{--<script type="text/javascript">--}}
      {{--$("#input-id").rating();--}}
  {{--</script>--}}

@endsection

@section('script')
  <script type="text/javascript">
      $("#input-id").rating();
  </script>
@endsection