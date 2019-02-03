<ul class="nav nav-tabs mb-3">
    @can ('manage-users')
        <li class="nav-item">
            <a class="nav-link{{ $page === 'users' ? ' active' : '' }}"
               href="{{ route('admin.users.index') }}">
                {{config('admin.menu.users')}}
            </a>
        </li>
    @endcan
    @can ('manage-adverts')
        <li class="nav-item">
            <a class="nav-link{{ $page === 'adverts' ? ' active' : '' }}"
               href="{{ route('admin.adverts.adverts.index') }}">
                {{config('admin.menu.products')}}
            </a>
        </li>
    @endcan
    @can ('manage-banners')
        <li class="nav-item">
            <a class="nav-link{{ $page === 'banners' ? ' active' : '' }}"
               href="{{ route('admin.banners.index') }}">
                {{config('admin.menu.banners')}}
            </a>
        </li>
    @endcan
    @can ('manage-regions')
        <li class="nav-item">
            <a class="nav-link{{ $page === 'regions' ? ' active' : '' }}"
               href="{{ route('admin.regions.index') }}">
                {{config('admin.menu.regions')}}
            </a>
        </li>
    @endcan
    @can ('manage-adverts-categories')
        <li class="nav-item">
            <a class="nav-link{{ $page === 'adverts_categories' ? ' active' : '' }}"
               href="{{ route('admin.adverts.categories.index') }}">
                {{config('admin.menu.categories')}}
            </a>
        </li>
    @endcan
    @can ('manage-pages')
        <li class="nav-item">
            <a class="nav-link{{ $page === 'pages' ? ' active' : '' }}"
               href="{{ route('admin.pages.index') }}">{{config('admin.menu.pages')}}
            </a>
        </li>
    @endcan
    @can ('manage-tickets')
        <li class="nav-item">
            <a class="nav-link{{ $page === 'tickets' ? ' active' : '' }}"
               href="{{ route('admin.tickets.index') }}">
                {{config('admin.menu.tickets')}}
            </a>
        </li>
    @endcan
</ul>