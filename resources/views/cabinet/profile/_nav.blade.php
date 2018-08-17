<ul class="nav nav-tabs mb-3">
    <li class="nav-item"><a class="nav-link" href="{{ route('cabinet.home', auth()->user()->id) }}">Dashboard</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('cabinet.adverts.index', auth()->user()->id) }}">Adverts</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('cabinet.favorites.index', auth()->user()->id) }}">Favorites</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('cabinet.banners.index', auth()->user()->id) }}">Banners</a></li>
    <li class="nav-item"><a class="nav-link active" href="{{ route('cabinet.profile.home', auth()->user()->id) }}">Profile</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('cabinet.tickets.index', auth()->user()->id) }}">Tickets</a></li>
</ul>