<!-- Start Header Area -->
<header class="header_area sticky-header">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light main_box">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="{{ route('home') }}"><img src="{{ asset('img/logo.png') }}" alt=""></a>
                <button class="navbar-toggler" 
                        type="button" 
                        data-toggle="collapse" 
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" 
                        aria-expanded="false" 
                        aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('shop.index') }}">Shop</a>                         
                        </li>
                        <li class="nav-item submenu dropdown">
                            <a href="blog.blade.php" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                             aria-expanded="false">Blog</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="{{ route('blog')}}">Blog</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('single-blog') }}">Blog Details</a></li>
                            </ul>
                        </li>                        
                        <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                    </ul>

                    <ul class="ml-auto navbar-nav ml-auto">
                        <li class="nav-item">
                            <div>
                                <li class="navbar-nav ml-auto">                                    
                                    @if (Auth::user())                                             
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('orders') }}">Orders</a>
                                        </li>
                                        <li class="nav-item">            
                                            <a class="nav-link"
                                                href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();"
                                            >
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                                @csrf            
                                            </form>
                                        </li>
                                    @else        
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">
                                                <i class="fa fa-user"></i>
                                                Login
                                            </a>
                                        </li> 
                        
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">
                                                <i class="fas fa-sticky-note"></i>
                                                Create Account
                                            </a>
                                        </li>            
                                    @endif
                                </li>
                            </div>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item">
                            <a href="{{ route('cart.index') }}" class="cart">
                                <i class="fa fa-shopping-cart" style="color:black;font-size:19px;"></i>
                                @if (count(Cart::getContent()) > 0)
                                    <span class="badge cart-badge badge-warning">{{ count(Cart::getContent()) }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <button class="search">
                                <i class="fa fa-search" style="color:black;font-size:19px;" id="search"></i>
                            </button>
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
                <i class="fa fa-times" style="color:black;font-size:20px;" id="close_search" title="Close Search"></i>
            </form>
        </div>
    </div>
</header>
<!-- End Header Area -->