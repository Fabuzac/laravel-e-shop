<!-- Start Header Area -->
<header class="header_area sticky-header">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light main_box">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="{{ route('home') }}"><img src="img/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item active"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                             aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="{{ route('category') }}">Shop Category</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('orders') }}">Product Details</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('checkout.index') }}">Product Checkout</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('cart.index') }}">Shopping Cart</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('confirmation') }}">Confirmation</a></li>
                            </ul>
                        </li>
                        <li class="nav-item submenu dropdown">
                            <a href="blog.blade.php" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                             aria-expanded="false">Blog</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="{{ route('blog')}}">Blog</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('single-blog') }}">Blog Details</a></li>
                            </ul>
                        </li>
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                             aria-expanded="false">Pages</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('tracking') }}">Tracking</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('elements') }}">Elements</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                        <li>

                            <div>
                                <ul class="navbar-nav me-auto">
                                    @if (Auth::user())    
                        
                                        @if (Auth::user()->role === 'ADMIN')
                                            <li class="nav-item">
                                            <a class="nav-link" href="#">Dashboard Admin</a>
                                            </li> 
                                        @endif
                                        <li class="nav-item">            
                                            <a class="nav-link"
                                                href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                            >
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                                @csrf            
                                            </form>
                                        </li>						
                                    @else        
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                                        </li> 
                        
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">Create Account</a>
                                        </li>            
                                    @endif
                                </ul>
                            </div>

                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item"><a href="#" class="cart"><span class="ti-bag"></span></a></li>
                        <li class="nav-item">
                            <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                        </li>
                    </ul>
                </div>
            </div>

            

        </nav>
    </div>
    <div class="search_input" id="search_input_box">
        <div class="container">
            <form class="d-flex justify-content-between">
                <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                <button type="submit" class="btn"></button>
                <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div>
</header>
<!-- End Header Area -->