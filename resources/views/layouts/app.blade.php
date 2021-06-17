<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Site made with Mobirise Website Builder v5.3.5, https://mobirise.com -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v5.3.5, mobirise.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="{{asset('css/assets/images/allnatura-silueta-198x201.png')}}" type="image/x-icon">
    <meta name="description" content="">


    <title>ProyectoTopicosSII</title>
    <link rel="stylesheet" href="{{asset('css/assets/web/assets/mobirise-icons2/mobirise2.css')}}">
    <link rel="stylesheet" href="{{asset('css/assets/web/assets/mobirise-icons-bold/mobirise-icons-bold.css')}}">
    <link rel="stylesheet" href="{{asset('css/assets/tether/tether.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap-grid.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/assets/bootstrap/css/bootstrap-reboot.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/assets/dropdown/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/assets/socicon/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('css/assets/theme/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="preload"
          href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap"
          as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap">
    </noscript>
    <link rel="preload" as="style" href="{{asset('css/assets/mobirise/css/mbr-additional.css')}}">
    <link rel="stylesheet" href="{{asset('css/assets/mobirise/css/mbr-additional.css')}}" type="text/css">
    <style>
        .container {
            position: relative;
            min-height: 600px;
            height: 80%;
        }
    </style>


</head>
<body>

<section class="menu cid-s48OLK6784" once="menu" id="menu1-k">

    <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
        <div class="container-fluid navMenu">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="{{route('home')}}">
                        <img src="{{asset('css/assets/images/allnatura-silueta-198x201.png')}}" alt="Tipicos2"
                             style="height: 6rem;">
                    </a>
                </span>
                <span class="navbar-caption-wrap"><a class="navbar-caption text-black text-primary display-7"
                                                     href="#"></a></span>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
                    @guest
                    <li class="nav-item dropdown open">
                        <a class="nav-link link text-black dropdown-toggle display-4" href="#" aria-expanded="true"
                           data-toggle="dropdown-submenu">
                            <span class="mobi-mbri mobi-mbri-home mbr-iconfont mbr-iconfont-btn"></span>Inicio
                        </a>
                        <div class="dropdown-menu">
                            <a class="text-black dropdown-item display-4" href="#" aria-expanded="true">
                                <span class="mobi-mbri mobi-mbri-unlock mbr-iconfont mbr-iconfont-btn"></span>{{ __('custom.login') }}
                            </a>
                        </div>
                    </li>
                    @else
                    <li class="nav-item dropdown open">
                        <a class="nav-link link text-black dropdown-toggle display-4" href="{{url('/')}}" aria-expanded="true"
                           data-toggle="dropdown-submenu">
                            <span class="mobi-mbri mobi-mbri-home mbr-iconfont mbr-iconfont-btn"></span>{{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" id="menudrop">
                            <a class="nav-link link text-black display-4" href="{{ route('logout') }}" onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">{{__('custom.logout')}}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link text-black display-4 {{ Request::path() === 'usuarios' ? 'nav-link active' : 'nav-link' }}" href="{{route('usuario.create')}}" aria-expanded="true">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                {{__('custom.users')}}
                                <?php  $users_count = App\Models\User::all()->count(); ?>
                                <span class="mobi-mbri mobi-mbri-users mbr-iconfont mbr-iconfont-btn"></span>{{ $users_count ?? '0' }}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link text-black display-4 {{ Request::path() === 'providers' ? 'nav-link active' : 'nav-link' }}" href="{{route('provedores.index')}}">
                            {{__('custom.providers')}}
                            <?php  $providers_count = App\Models\Provider::all()->count(); ?>
                            <span class="mobi-mbri mobi-mbri-briefcase mbr-iconfont mbr-iconfont-btn"></span>{{ $providers_count ?? '0' }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link text-black display-4" href="{{url('clientes')}}">
                            <span class="mobi-mbri mobi-mbri-cash mbr-iconfont mbr-iconfont-btn"></span>{{__('custom.clients')}}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link text-black display-4 {{ Request::path() === 'productos' ? 'nav-link active' : 'nav-link' }}" href="{{url('productos')}}">
                            {{__('custom.products')}}
                            <?php  $productos_count = App\Models\Producto::all()->count(); ?>
                            <span class="mobi-mbri mobi-mbri-cart-add mbr-iconfont mbr-iconfont-btn"></span>{{ $productos_count ?? '0' }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link text-black display-4" href="{{url('ventas')}}">
                            <span class="mobi-mbri mobi-mbri-shopping-bag mbr-iconfont mbr-iconfont-btn"></span>{{__('custom.sales')}}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link text-black display-4" href="{{url('roles')}}">
                            <span class="mbrib-key mbr-iconfont mbr-iconfont-btn"></span>{{__('custom.roles')}}
                        </a>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
        <div class="dot"></div>
    </nav>

</section>

<section class="header10 cid-szSDOVJc9Z" id="header10-n">
    @yield('content')
</section>

<section class="footer3 cid-s48P1Icc8J " once="footers" id="footer3-l">


    <div class="container-fluid">
        <div class="media-container-row align-center mbr-white">


            <div class="row row-copirayt">
                <p class="mbr-text mb-0 mbr-fonts-style mbr-white align-center display-7"><br>Uriel Mora &amp; Miriam
                    Hernández<br>© Copyright 2021</p>
            </div>
        </div>
    </div>
</section>
<section
    style="background-color: #fff; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif; color:#aaa; font-size:12px; padding: 0; align-items: center; display: flex;">
    <a href="https://mobirise.site/f" style="flex: 1 1; height: 3rem; padding-left: 1rem;"></a>
    <p style="flex: 0 0 auto; margin:0; padding-right:1rem;">Construido mediante Laravel 8</p>
</section>
<script src="{{asset('css/assets/web/assets/jquery/jquery.min.js')}}"></script>
<script src="{{asset('css/assets/popper/popper.min.js')}}"></script>
<script src="{{asset('css/assets/tether/tether.min.js')}}"></script>
<script src="{{asset('css/assets/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('css/assets/smoothscroll/smooth-scroll.js')}}"></script>
<script src="{{asset('css/assets/dropdown/js/nav-dropdown.js')}}"></script>
<script src="{{asset('css/assets/dropdown/js/navbar-dropdown.js')}}"></script>
<script src="{{asset('css/assets/touchswipe/jquery.touch-swipe.min.js')}}"></script>
<script src="{{asset(asset('css/assets/theme/js/script.js'))}}"></script>


</body>
</html>
