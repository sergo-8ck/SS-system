@extends('layouts.app')

@section('content')
    @include('admin.pages._nav')

    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-primary mr-1">Редактировать</a>
        <form method="POST" action="{{ route('admin.pages.destroy', $page) }}" class="mr-1">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Удалить</button>
        </form>
    </div>

    <table class="table table-bordered table-striped">
        <tbody>
        <tr>
            <th>ID</th><td>{{ $page->id }}</td>
        </tr>
        <tr>
            <th>Заголовок</th><td>{{ $page->title }}</td>
        </tr>
        <tr>
            <th>Название в меню</th><td>{{ $page->menu_title }}</td>
        </tr>
        <tr>
            <th>Slug</th><td>{{ $page->slug }}</td>
        </tr>
        <tr>
            <th>Краткое описание</th><td>{{ $page->description }}</td>
        </tr>
        </tbody>
    </table>

    <div class="card">
        <div class="card-body pb-1">
            {!! clean($page->content) !!}
        </div>
    </div>
@endsection