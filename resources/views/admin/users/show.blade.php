@extends('layouts.app')

@section('content')
    @include('admin.users._nav')

    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary mr-1">Edit</a>

        @if ($user->isWait())
            <form method="POST" action="{{ route('admin.users.verify', $user) }}" class="mr-1">
                @csrf
                <button class="btn btn-success">Активировать</button>
            </form>
        @endif

        @if ($user->isActive())
            <form method="POST" action="{{ route('admin.users.ban', $user) }}" class="mr-1">
                @csrf
                <button class="btn btn-success">Забанить</button>
            </form>
        @endif

        <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="mr-1">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Удалить</button>
        </form>
    </div>

    <table class="table table-bordered table-striped">
        <tbody>
        <tr>
            <th>ID</th><td>{{ $user->id }}</td>
        </tr>
        <tr>
            <th>Название</th><td>{{ $user->name }}</td>
        </tr>
        <tr>
            <th>Email</th><td>{{ $user->email }}</td>
        </tr>
        <tr>
            <th>Статус</th>
            <td>
                @if ($user->isWait())
                    <span class="badge badge-secondary">Ожидает</span>
                @endif
                @if ($user->isActive())
                    <span class="badge badge-primary">Активный</span>
                @endif
            </td>
        </tr>
        <tr>
            <th>Роль</th>
            <td>
                @if ($user->isAdmin())
                    <span class="badge badge-danger">Администратор</span>
                @else
                    <span class="badge badge-secondary">Пользователь</span>
                @endif
            </td>
        </tr>
        <tbody>
        </tbody>
    </table>
@endsection