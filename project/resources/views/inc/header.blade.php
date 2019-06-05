<!-- main header start -->
<header class="main-header do-sticky" id="main-header-2">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg navbar-light rounded">
                    <a class="navbar-brand logo" href="/">
                        <img src="{{asset('front')}}/img/logos/logo.png" alt="logo">State Police System
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
                            aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="fa fa-bars"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbar">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('index')}}"> Home
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="{{route('services')}}" id="navbarDropdown9"> Services
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('team')}}" id="navbarDropdownMenuLink2"
                                   aria-haspopup="true" aria-expanded="false"> Team
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="{{route('news')}}" id="navbarDropdownMenuLink5"> Newsroom
                                </a>
                            </li>
                            @if(\Illuminate\Support\Facades\Auth::guest())
                                <li class="nav-item">
                                    <a class="nav-link" href="/login" id="navbarDropdownMenuLink7"> Login</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('home')}}"
                                       id="navbarDropdownMenuLink7"> {{\Illuminate\Support\Facades\Auth::user()->name}}</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- main header end -->