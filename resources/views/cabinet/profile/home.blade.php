@extends('layouts.app')

@section('content')
  @include('cabinet.profile._nav')

  <div class="mb-3">
    <a href="{{ route('cabinet.profile.edit') }}" class="btn btn-primary">Редактировать</a>
  </div>

  <table class="table table-bordered">
    <tbody>
    <tr>
      <th>Имя</th>
      <td>{{ $user->name }}</td>
    </tr>
    <tr>
      <th>Фамилия</th>
      <td>{{ $user->last_name }}</td>
    </tr>
    <tr>
      <th>Email</th>
      <td>{{ $user->email }}</td>
    </tr>
    <tr>
      <th>Телефон</th>
      <td>
        @if ($user->phone)
          {{ $user->phone }}
          @if (!$user->isPhoneVerified())
            <i>(не подтвержден)</i><br/>
            <form method="POST" action="{{ route('cabinet.profile.phone') }}">
              @csrf
              <button type="submit" class="btn btn-sm btn-success">Подтвердить</button>
            </form>
          @endif
        @endif
      </td>
    </tr>
    @if ($user->phone)
      <tr>
        <th>Статус</th>
        <td>
          <form method="POST" action="{{ route('cabinet.profile.phone.auth') }}">
            @csrf
            @if ($user->isPhoneAuthEnabled())
              <button type="submit" class="btn btn-sm btn-success">On</button>
            @else
              <button type="submit" class="btn btn-sm btn-danger">Off</button>
            @endif
          </form>
        </td>
      </tr>
    @endif
    </tbody>
  </table>
@endsection