@extends('layouts.app')

@section('content')
    @include('cabinet.favorites._nav')

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Регион</th>
            <th>Категория</th>
            <th>Обновлено</th>
            <th></th>
        </tr>
        </thead>
        <tbody>

        @foreach ($adverts as $advert)
            <tr>
                <td>{{ $advert->id }}</td>
                <td><a href="{{ route('adverts.show', [$subdomain_userid, $advert]) }}" target="_blank">{{ $advert->title }}</a></td>
                <td>
                    @if ($advert->region)
                        {{ $advert->region->name }}
                    @endif
                </td>
                <td>{{ $advert->category->name }}</td>
                <td>{{ $advert->updated_at }}</td>
                <td>
                    <form method="POST" action="{{ route('cabinet.favorites.remove', [$subdomain_userid, $advert]) }}" class="mr-1">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger"><span class="fa fa-remove"></span>Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    {{ $adverts->links() }}
@endsection