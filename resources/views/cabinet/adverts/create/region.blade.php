@extends('layouts.app')

@section('content')
    @include('cabinet.adverts._nav')

    @if ($region)
        <p>
            <a href="{{ route('cabinet.adverts.create.advert', [$subdomain_userid, $category, $region]) }}" class="btn btn-success">Добавить продукт для {{ $region->name }}</a>
        </p>
    @else
        <p>
            <a href="{{ route('cabinet.adverts.create.advert', [$subdomain_userid, $category]) }}" class="btn btn-success">Добавить продукт для всех регионов</a>
        </p>
    @endif

    <p>Выберите регион:</p>

    <ul>
        @foreach ($regions as $current)
            <li>
                <a href="{{ route('cabinet.adverts.create.region', [$subdomain_userid, $category, $current]) }}">{{ $current->name }}</a>
            </li>
        @endforeach
    </ul>
@endsection