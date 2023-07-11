@php
    $toko = App\Alamat_toko::where('id', 1)->first();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $toko->name_store }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="{{ asset('shopper') }}/fonts/icomoon/style.css">

    <link rel="stylesheet" href="{{ asset('shopper') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('shopper') }}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('shopper') }}/css/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('shopper') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('shopper') }}/css/owl.theme.default.min.css">


    <link rel="stylesheet" href="{{ asset('shopper') }}/css/aos.css">

    <link rel="stylesheet" href="{{ asset('shopper') }}/css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
        }

        img {
            overflow: hidden;
            position: relative;
            object-fit: cover;

        }
    </style>
</head>

<body>

    <div class="site-wrap">
        <header class="site-navbar" role="banner">
            <div class="site-navbar-top">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                            <form action="{{ route('user.produk.cari') }}" method="get" class="site-block-top-search">
                                @csrf
                                <span class="icon icon-search2"></span>
                                <input type="text" class="form-control border-0" name="cari" placeholder="Search">
                            </form>
                        </div>

                        <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
                            <div class="font-weight-bold">
                                <a href="{{ route('home') }}" class="js-logo-clone">{{ $toko->name_store }}</a>
                            </div>
                        </div>

                        <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                            <div class="top-right links">
                                <div class="site-top-icons">
                                    <ul>
                                        @if (Route::has('login'))
                                            @auth
                                                <li>
                                                    <div class="dropdown">
                                                        <a class="dropdown-toggle" id="dropdownMenuButton"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <span class="icon icon-person"></span>
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item"
                                                                href="{{ route('user.alamat') }}">Pengaturan Alamat</a>
                                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                                onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                                                                Logout
                                                            </a>

                                                            <form id="logout-form" action="{{ route('logout') }}"
                                                                method="POST" style="display: none;">
                                                                @csrf
                                                            </form>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <?php
                                                    $user_id = \Auth::user()->id;
                                                    $total_keranjang = \DB::table('keranjang')
                                                        ->select(DB::raw('count(id) as jumlah'))
                                                        ->where('user_id', $user_id)
                                                        ->first();
                                                    ?>
                                                    <a href="{{ route('user.keranjang') }}" class="site-cart">
                                                        <span class="icon icon-add_shopping_cart"></span>
                                                        <span class="count">{{ $total_keranjang->jumlah }}</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <?php
                                                    $user_id = \Auth::user()->id;
                                                    $total_order = \DB::table('order')
                                                        ->select(DB::raw('count(id) as jumlah'))
                                                        ->where('user_id', $user_id)
                                                        ->where('status_order_id', '!=', 5)
                                                        ->where('status_order_id', '!=', 6)
                                                        ->first();
                                                    ?>
                                                    <a href="{{ route('user.order') }}" class="site-cart">
                                                        <span class="icon icon-shopping_cart"></span>
                                                        <span class="count">{{ $total_order->jumlah }}</span>
                                                    </a>
                                                </li>
                                            @else
                                                <div class="dropdown">
                                                    <a class="dropdown-toggle" id="dropdownMenuButton"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="icon icon-person"></span>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="{{ route('login') }}">Masuk</a>
                                                        @if (Route::has('register'))
                                                            <a class="dropdown-item"
                                                                href="{{ route('register') }}">Daftar</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endauth
                                </div>
                                @endif
                                <li class="d-inline-block d-md-none ml-md-0"><a
                                        href="#"class="site-menu-toggle js-menu-toggle"><span
                                            class="icon-menu"></span></a></li>
                            </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="site-navigation text-right text-md-center" role="navigation">
                <div class="container">
                    <ul class="site-menu js-clone-nav d-none d-md-block">
                        <li class="{{ Request::path() === '/' ? '' : '' }}"><a href="{{ route('home') }}">Beranda</a>
                        </li>
                        <li class="{{ Request::path() === 'produk' ? '' : '' }}"><a
                                href="{{ route('user.produk') }}">Produk</a></li>
                        <li><a href="{{ route('contact.index') }}">Contact</a></li>
                    </ul>
                </div>
            </nav>
        </header>

        @yield('content')

        <footer class="site-footer border-top">
            <div class="container">
                <div class="row">
                    <div class="col-md mb-5 mb-lg-0">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="footer-heading mb-4">Tentang Toko</h3>
                                <ul class="list-unstyled">
                                    <p>{{ $toko->description }}</p>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @php
                        $city = App\City::where('city_id', $toko->city_id)->first();
                    @endphp
                    <div class="col-md col-lg-4">
                        <div class="block-5 mb-5">
                            <h3 class="footer-heading mb-4">Contact Info</h3>
                            <ul class="list-unstyled">
                                <li class="address">
                                    {{ $city->title }}, {{ $toko->detail }}
                                </li>
                                <li class="phone"><a
                                        href="https://api.whatsapp.com/send/?phone={{ $toko->telp }}&text&type=phone_number&app_absent=0">{{ $toko->telp }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="{{ asset('shopper') }}/js/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    <script src="{{ asset('shopper') }}/js/jquery-ui.js"></script>
    <script src="{{ asset('shopper') }}/js/popper.min.js"></script>
    <script src="{{ asset('shopper') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('shopper') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('shopper') }}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('shopper') }}/js/aos.js"></script>

    <script src="{{ asset('shopper') }}/js/main.js"></script>
    @yield('js')
</body>

</html>
