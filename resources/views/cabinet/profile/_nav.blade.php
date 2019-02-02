<ul class="nav nav-tabs mb-3">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('cabinet.home', auth()->user()->id)}}">
            {{config('cabinet.menu.dashboard')}}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('cabinet.adverts.index', auth()->user()->id) }}">
            {{config('cabinet.menu.products')}}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('cabinet.favorites.index', auth()->user()->id) }}">
            {{config('cabinet.menu.favorites')}}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('cabinet.banners.index', auth()->user()->id) }}">
            {{config('cabinet.menu.banners')}}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="{{ route('cabinet.profile.home', auth()->user()->id) }}">
            {{config('cabinet.menu.profiles')}}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('cabinet.tickets.index', auth()->user()->id) }}">
            {{config('cabinet.menu.messages')}}
        </a>
    </li>
</ul>