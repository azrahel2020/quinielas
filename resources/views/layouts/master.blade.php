<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Aplicación')</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    @stack('styles')
</head>
<body>
    <div class="container-grid">
        
        <!-- Header -->
        <div class="header">
            <div class="navbar navbar-default">
                <input type="checkbox" class="navbar__check-menu-bottom" id="menu-bottom">
                <input type="checkbox" class="navbar__check-aside" id="aside">
                <div class="navbar__btn-movil">
                    <label for="menu-bottom">
                        <i class="fa-solid fa-bars"></i>
                    </label>
                </div>
                <div class="navbar__btn-pc">
                    <label for="aside">
                        <i class="fa-solid fa-bars"></i>
                    </label>
                </div>

                <!-- menu-bottom -->
                <div class="menu-bottom">
                    <div class="navigation">
                        <ul>
                            <li class="list active">
                                <a href="{{ route('usuarios.bets.quinielas') }}">
                                    <span class="icon"><i class="fa-solid fa-house"></i></span>
                                    <span class="text">Home</span>
                                </a>
                            </li>
                            <li class="list">
                                <a href="#">
                                    <span class="icon"><i class="fa-solid fa-user"></i></span>
                                    <span class="text">Profile</span>
                                </a>
                            </li>
                            <li class="list">
                                <a href="#">
                                    <span class="icon"><i class="fa-solid fa-envelope"></i></span>
                                    <span class="text">Message</span>
                                </a>
                            </li>
                            <li class="list">
                                <a href="#">
                                    <span class="icon"><i class="fa-solid fa-image"></i></span>
                                    <span class="text">Photo</span>
                                </a>
                            </li>
                            <li class="list">
                                <a href="#">
                                    <span class="icon"><i class="fa-solid fa-gear"></i></span>
                                    <span class="text">Settings</span>
                                </a>
                            </li>
                            <div class="indicator"></div>
                        </ul>
                    </div>
                </div>

                <!-- Aside -->
                <div class="aside">
                    <label for="aside" class="aside__close">x</label>
                    <div class="aside__profile">
                        <div class="aside__imagen">
                            <img src="{{ asset('img/perfil.jpg') }}" alt="">
                        </div>
                        <div class="aside__role-img">
                            <img src="{{ asset('img/admin.png') }}" alt="">
                        </div>
                        <div class="aside__name">Rosa Perez</div>
                        <div class="aside__role">Administrador</div>
                    </div>
                    <div class="aside__menu">
                        <ul>
                            <li class="aside__links">
                                <a href="#">
                                    <i class="fa-solid fa-house"></i>
                                    <span class="aside__name">Dashboard</span>
                                </a>
                            </li>
                            <li class="aside__links">
                                <a href="#">
                                    <i class="fa-solid fa-user"></i>
                                    <span class="aside__name">Usuarios</span>
                                </a>
                            </li>
                            <li class="aside__links">
                                <a href="#">
                                    <i class="fa-solid fa-folder-tree"></i>
                                    <span class="aside__name">Categorias</span>
                                </a>
                            </li>
                            <li class="aside__links">
                                <a href="#">
                                    <i class="fa-solid fa-box-open"></i>
                                    <span class="aside__name">Productos</span>
                                </a>
                            </li>
                            <li class="aside__links">
                                <a href="#">
                                    <i class="fa-solid fa-clipboard-check"></i>
                                    <span class="aside__name">Ordenes</span>
                                </a>
                            </li>
                            <li class="aside__links">
                                <a href="#">
                                    <i class="fa-solid fa-truck"></i>
                                    <span class="aside__name">Envios</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="aside__logout">
                        <li class="aside__links">
                            <a href="#">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                <span class="aside__name">Cerrar Sesion</span>
                            </a>
                        </li>
                    </div>
                </div>

                <!-- Logo -->
                <div class="navbar__logo">
                    <img src="{{ asset('img/Conmebol_copa_america_2024.jpg') }}" alt="">
                </div>

                <!-- Search -->
                <div class="navbar__search">
                    <input class="navbar__input-search" type="text" placeholder="Buscar...">
                    <div class="navbar__btn-search"><i class="fa-solid fa-magnifying-glass"></i></div>
                </div>

                <!-- Menu PC -->
                <div class="menu-pc">
                    <ul>
                        <li>Home</li>
                        <li>Services</li>
                        <li>Contact</li>
                    </ul>
                </div>

                <!-- Menu Icons -->
                <div class="menu-icons">
                    <ul>
                        <li class="menu-icons__li menu-icons__li--wishlist">
                            <a>
                                <i class="fa-solid fa-heart"></i>
                                <div class="menu-icons__badge">3</div>
                            </a>
                           {{--  <div class="wishlist">
                                <div class="wishlist__detalles">
                                    <div class="wishlist__info">
                                        <div class="wishlist__img">
                                            <img src="{{ asset('img/gorra.png') }}" alt="">
                                        </div>
                                        <div class="wishlist__data">
                                            <div class="wishlist__nombre">Gorra Caballero</div>
                                            <div class="wishlist__precio">$5.000</div>
                                        </div>
                                        <div class="wishlist__btn-add"><i class="fa-solid fa-heart"></i></div>
                                    </div>
                                    <div class="wishlist__info">
                                        <div class="wishlist__img">
                                            <img src="{{ asset('img/cartera.png') }}" alt="">
                                        </div>
                                        <div class="wishlist__data">
                                            <div class="wishlist__nombre">Cartera</div>
                                            <div class="wishlist__precio">$10.000</div>
                                        </div>
                                        <div class="wishlist__btn-add"><i class="fa-solid fa-heart"></i></div>
                                    </div>
                                </div>
                                <div class="wishlist__boton">Tus Deseos</div>
                            </div> --}}
                        </li>
                        <li class="menu-icons__li menu-icons__li--cart">
                            <a>
                                <i class="fa-solid fa-cart-shopping"></i>
                                <div class="menu-icons__badge">3</div>
                            </a>
                            {{-- <div class="cart-menu">
                                <div class="cart-menu__detalles">
                                    <div class="cart-menu__info">
                                        <div class="cart-menu__img">
                                            <img src="{{ asset('img/reloj-mujer.png') }}" alt="">
                                        </div>
                                        <div class="cart-menu__data">
                                            <div class="cart-menu__nombre">Reloj Dama</div>
                                            <div class="cart-menu__precio">$5.000</div>
                                            <div class="cart-menu__cant">cant: 2</div>
                                        </div>
                                    </div>
                                    <div class="cart-menu__info">
                                        <div class="cart-menu__img">
                                            <img src="{{ asset('img/colonia.png') }}" alt="">
                                        </div>
                                        <div class="cart-menu__data">
                                            <div class="cart-menu__nombre">Perfume</div>
                                            <div class="cart-menu__precio">$10.000</div>
                                            <div class="cart-menu__cant">cant: 1</div>
                                        </div>
                                    </div>
                                    <div class="cart-menu__info">
                                        <div class="cart-menu__img">
                                            <img src="{{ asset('img/collar.png') }}" alt="">
                                        </div>
                                        <div class="cart-menu__data">
                                            <div class="cart-menu__nombre">Collar</div>
                                            <div class="cart-menu__precio">$50.000</div>
                                            <div class="cart-menu__cant">cant: 2</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cart-menu__total">Total: $5.000</div>
                                <div class="cart-menu__btn">Checkout</div>
                            </div> --}}
                        </li>
                    </ul>
                </div>

                <!-- Profile -->
                <div class="profile">
                    <div class="profile__img">
                        <img src="{{ asset('img/perfil.jpg') }}" alt="">
                    </div>
                    <div class="profile__name">Paola</div>
                    <div class="profile__icon"><i class="fa-solid fa-angle-down"></i></div>
                    <div class="profile__logout">
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="fa-solid fa-power-off"></i>
                                    <span class="">Cerrar sesion</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="contenido">
            @yield('content')
        </div>

        <div class="footer">s</div>
    </div>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/navbarmobil.js') }}"></script>
    <script src="{{ asset('js/imagenpreview.js') }}"></script>
    @stack('scripts')
</body>
</html>
