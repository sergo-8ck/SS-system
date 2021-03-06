
<header class="header-one">
  <div class="top-header">
    <div class="container clearfix">
      <div class="logo float-left"><a href="/"><img src="images/logo/logo.png" alt=""></a></div>
      <div class="address-wrapper float-right">
        <ul>
          <li class="address">
            <i class="icon flaticon-placeholder"></i>
            <h6>Адрес:</h6>
            <p>ул. Буракова, д. 27 корп. 3.</p>
          </li>
          <li class="address">
            <i class="icon flaticon-multimedia"></i>
            <h6>E-mail адрес:</h6>
            <p>ATG-Service@yandex.ru</p>
          </li>
          @guest
            <li class="quotes"><a href="{{route('login', '1')}}">Авторизация</a></li>
          @else
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                @can ('admin-panel')
                  <a class="dropdown-item" href="{{ route('admin.home') }}">Админка</a>
                @endcan
                <a class="dropdown-item" href="{{ route('cabinet.home') }}">Кабинет</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                  Выйти
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </div>
            </li>
          @endguest

        </ul>
      </div>
    </div>
  </div>

  <div class="theme-menu-wrapper">
    <div class="container">
      <div class="bg-wrapper clearfix">
        <div class="menu-wrapper float-left">
          <nav id="mega-menu-holder" class="clearfix">
            <ul class="clearfix">
              <li><a href="/">Главная</a></li>
              <li><a href="contact">Контакты</a></li>
            </ul>
          </nav>
        </div>

        <div class="right-widget float-right">
          <ul>
            {{--<li class="social-icon">--}}
              {{--<ul>--}}
                {{--<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>--}}
                {{--<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>--}}
                {{--<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>--}}
                {{--<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>--}}
              {{--</ul>--}}
            {{--</li>--}}
            <li class="cart-icon">
              <a href="#"><i class="flaticon-login"></i></a>
            </li>
            {{--<li class="search-option">--}}
              {{--<div class="dropdown">--}}
                {{--<button type="button" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-search" aria-hidden="true"></i></button>--}}
                {{--<form action="#" class="dropdown-menu">--}}
                  {{--<input type="text" Placeholder="Enter Your Search">--}}
                  {{--<button><i class="fa fa-search"></i></button>--}}
                {{--</form>--}}
              {{--</div>--}}
            {{--</li>--}}
          </ul>
        </div>
      </div>
    </div>
  </div>
</header>