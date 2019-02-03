@extends('front/layouts/_layout')

@section('meta')
    <meta name="description" content="{{ $page->description }}">
@endsection

@section('content')

    <!--
    =============================================
        Theme Inner Banner
    ==============================================
    -->
    <div class="theme-inner-banner section-spacing">
        <div class="overlay">
            <div class="container">
                <h2>{{ $page->title }}</h2>
            </div> <!-- /.container -->
        </div> <!-- /.overlay -->
    </div> <!-- /.theme-inner-banner -->


    <!--
    =============================================
        Our Blog
    ==============================================
    -->
    <div class="our-blog section-spacing">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8 col-12">
                    <div class="post-wrapper blog-details">
                        <div class="single-blog">
                            <div class="post-meta">
                                @if ($page->children)
                                    <ul>
                                        @foreach ($page->children as $child)
                                            <li><a href="{{ route('page', page_path($child)) }}">{{ $child->title }}</a></li>
                                        @endforeach
                                    </ul>
                                @endif
                                {!! clean($page->content) !!}
                            </div> <!-- /.post-meta -->
                        </div> <!-- /.single-blog -->
                    </div> <!-- /.post-wrapper -->
                </div>
                <!-- ===================== Blog Sidebar ==================== -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8 col-12 blog-sidebar">
                    <div class="sidebar-container sidebar-search">
                        <form action="#">
                            <input type="text" placeholder="Search...">
                            <button><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </div> <!-- /.sidebar-search -->
                    <div class="sidebar-container sidebar-categories">
                        <h5 class="title">Категории</h5>
                        <ul class="tree">
                            <li><a href="#">Главная</a></li>
                            @foreach ($menuPages as $page)
                                <li><a href="{{ route('page', page_path($page)) }}">{{ $page->getMenuTitle() }}</a>
                                    @if (!$page->children->isEmpty())
                                        <ul>
                                            @foreach ($page->children as $child)
                                                <li><a href="{{ route('page', page_path($child)) }}">{{ $child->title }}</a></li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div> <!-- /.sidebar-categories -->
                </div> <!-- /.col- -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /.blog-details -->



@stop