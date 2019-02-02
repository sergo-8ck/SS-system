@extends('layouts.app')

@section('content')
    @include('cabinet.banners._nav')

    @if ($region)
        <p>
            <a href="{{ route('cabinet.banners.create.banner', [$subdomain_userid, $category, $region]) }}" class="btn btn-success">Добавить продукт для {{ $region->name }}</a>
        </p>
    @else
        <p>
            <a href="{{ route('cabinet.banners.create.banner', [$subdomain_userid, $category]) }}" class="btn btn-success">Добавить продукт ко всем регионам</a>
        </p>
    @endif

    <p>Выбрать подрегион:</p>

    <ul>
        @foreach ($regions as $current)
            <li>
                <a href="{{ route('cabinet.banners.create.region', [$subdomain_userid, $category, $current]) }}">{{ $current->name }}</a>
            </li>
        @endforeach
    </ul>
@endsection