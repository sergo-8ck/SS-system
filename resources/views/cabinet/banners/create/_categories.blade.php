<ul>
    @foreach($categories as $category)
        <li>
            <a href="{{ route('cabinet.banners.create.region', [$subdomain_userid, $category]) }}">{{ $category->name }}</a>
            @include('cabinet.banners.create._categories', ['categories' => $category->children])
        </li>
    @endforeach
</ul>