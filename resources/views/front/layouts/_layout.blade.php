<!DOCTYPE html>
<html lang="ru">
<head>
  @include('front.layouts.meta')
  <title>{{ $title }}</title>
  <meta name="description" content="{{ $description }}">
  @include('front.layouts.styles')
</head>
<body>
<div class="main-page-wrapper">

  @include('front/layouts/header')

  @yield('content')

  @include('front/layouts/footer')

  @include('front.layouts.scripts')
</div>
</body>
</html>