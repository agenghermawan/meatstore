    <nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top" data-aos="fade-down">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="/images/logo.svg" alt="" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active mt-2">
                        <a class="nav-link" href="/">Home </a>
                    </li>
                    <li class="nav-item   mt-2">
                        <a class="nav-link" href="{{ route('categories') }}">Categories</a>
                    </li>
                    <li class="nav-item   mt-2">
                        <a class="nav-link" href="{{ route('categories') }}">About Me</a>
                    </li>
                    @auth
                        <li class="nav-item  mt-2">
                            <a class="nav-link" href="#">Order History</a>
                        </li>
                    @endauth
                    @guest
                        <li class="nav-item   mt-2">
                            <a class="nav-link" href="{{ route('register') }}">Sign Up</a>
                        </li>
                        <li class="nav-item  mt-2">
                            <a class="btn btn-success nav-link px-4 text-white" href="{{ route('login') }}">Sign In</a>
                        </li>
                    @endguest
                    @auth
                        <!-- Desktop Menu -->
                        <li class="nav-item">
                            <a href="{{ route('cart.index') }}" class="nav-link d-inline-block mt-2">
                                @php
                                    $carts = \App\Models\Cart::where('users_id', Auth::user()->id)->count();
                                @endphp
                                @if ($carts > 0)
                                    <a class="nav-link d-inline-block mt-2" href="#">
                                        <img src="{{ asset('frontend/images/icon-cart-filled.svg') }}" alt="" />
                                        <div class="cart-badge">{{ $carts }}</div>
                                    </a>
                                @else
                                    <img src="{{ asset('frontend/images/icon-cart-empty.svg') }}" alt="" />
                                @endif
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="{{ asset('frontend/images/icon-user.png') }}" alt=""
                                    class="rounded-circle mr-2 profile-picture" />
                                Hi, {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/dashboard.html">Dashboard</a>
                                <a class="dropdown-item" href="/dashboard-account.html">Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/">Logout</a>
                            </div>
                        </li>
                    </ul>

                    <!-- Mobile Menu -->
                    <ul class="navbar-nav d-block d-lg-none">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Hi, {{ Auth::user()->name }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-inline-block" href="#">
                                Cart
                            </a>
                        </li>
                    </ul>
                @endauth
                </ul>
            </div>
        </div>
    </nav>
