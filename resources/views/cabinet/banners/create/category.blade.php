@extends('layouts.app')

@section('content')
    @include('cabinet.banners._nav')

    <p>Choose category:</p>

    @include('cabinet.banners.create._categories', ['categories' => $categories, $subdomain_userid])

@endsection