@extends('layouts.app')

@section('content')
    <ul class="nav nav-tabs mb-3">
        <li class="nav-item"><a class="nav-link active" href="{{ route('cabinet.home') }}">{{config('cabinet.menu.dashboard')}}</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('cabinet.adverts.index')
        }}">{{config('cabinet.menu.products')}}</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('cabinet.favorites.index')
        }}">{{config('cabinet.menu.favorites')}}</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('cabinet.banners.index')
        }}">{{config('cabinet.menu.banners')}}</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('cabinet.profile.home')
        }}">{{config('cabinet.menu.profiles')}}</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('cabinet.tickets.index')
        }}">{{config('cabinet.menu.messages')}}</a></li>
    </ul>
@endsection