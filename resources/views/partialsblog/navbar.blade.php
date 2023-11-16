<header>
    <nav>
        <ul class="nav-list">
            <li class="nav-item">
                <a href="#"><img src="{{asset('assets/images/logo tourism.png')}}" alt="" class="logo-1"></a>
            </li>
            <li class="nav-item">
                <a href="{{route('home')}}">HOME</a>
            </li>
            <li class="nav-item">
                <a href="{{route('tourguide')}}">TOUR</a>
            </li>
            <li class="nav-item">
                <a href="{{route('blog')}}">BLOG</a>
            </li>
            <li>
             
                        <button class="dropdown__button" id="dropdown-button">
                   <i class="ri-user-3-line dropdown__icon"></i>
                   <span class="dropdown__name">My profile</span>
    
                   <div class="dropdown__icons">
                      <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                      <i class="ri-close-line dropdown__close"></i>
                   </div>
                </button>
    
                <ul class="dropdown__menu">
                   <li class="dropdown__item">
                      <i class="ri-message-3-line dropdown__icon"></i> 
                      <span class="dropdown__name"><a href="">Dasboard</a></span>
                   </li>
    
                   <li class="dropdown__item">
                      <i class="ri-settings-3-line dropdown__icon"></i>
                      <span class="dropdown__name"><a href="">Settings</a></span>
                   </li>
                </ul>
                
            </li>
            {{-- <li class="nav-item">
                <a href="{{route('login')}}">Log In</a>
            </li> --}}
        </ul>
    </nav>
    <div class="banner">
        <div class="container-1">
            <h1 class="banner-tittle">
                <span>Pulau</span> Bintan
            </h1>
            <p> Keindahan alam Pulau Bintan Temukan Pesona Alam yang Menawan</p>
        </div>
    </div>
</header>