@extends('layouts.app')

@section('content')
    @include('cabinet.adverts._nav')

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Регион</th>
            <th>Категория</th>
            <th>Обновлено</th>
            <th>Статус</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($adverts as $advert)
            <tr>
                <td>{{ $advert->id }}</td>
                <td><a href="{{ route('adverts.show', $advert) }}" target="_blank">{{ $advert->title }}</a></td>
                <td>
                    @if ($advert->region)
                        {{ $advert->region->name }}
                    @endif
                </td>
                <td>{{ $advert->category->name }}</td>
                <td>{{ $advert->updated_at }}</td>
                <td>
                    @if ($advert->isDraft())
                        <span class="badge badge-secondary">Черновик</span>
                    @elseif ($advert->isOnModeration())
                        <span class="badge badge-primary">Moderation</span>
                    @elseif ($advert->isActive())
                        <span class="badge badge-primary">Активный</span>
                    @elseif ($advert->isClosed())
                        <span class="badge badge-secondary">Закрыт</span>
                    @endif
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    {{ $adverts->links() }}
@endsection