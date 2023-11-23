<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="{{asset('assets-landingpage/style.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('assets-dash/images/favicon.png')}}" />
</head>

<body>
    <!-- Header -->
    <header class="parallax-window" data-parallax="scroll" data-image-src="{{asset('assets-landingpage/Images/Bg-header.jpg')}}">
        <nav>
            <h1 class="logo">
                <a href="{{route('blog')}}">Pulau Bintan</a>
            </h1>
            <div class="header-bottom">
                <ul class="social-media">   
                    <!-- <li><a href=""><img src="{{asset('assets-landingpage/Images/youtube.png')}}" alt=""></a></li> -->
                    <li><a href=""><img src="{{asset('assets-landingpage/Images/github.png')}}" alt=""></a></li>
                    <!-- <li><a href=""><img src="{{asset('assets-landingpage/Images/instagram.png')}}" alt=""></a></li> -->
                </ul>
                <div class="dropp">
                    <div class="dropdown" id="dropdown-content">
                        <button class="dropdown__button" id="dropdown-button">
                            <i class="ri-user-3-line dropdown__icon"></i>
                            @if(auth()->check())
                                <span class="dropdown__name">{{ auth()->user()->name }}</span>
                            @else
                                <span class="dropdown__name"><a href="{{ route('login') }}">My Profile</a></span>
                            @endif
                
                            <div class="dropdown__icons">
                                <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                                <i class="ri-close-line dropdown__close"></i>
                            </div>
                        </button>
                
                        @auth
                        <ul class="dropdown__menu">
                            @if(auth()->user()->role === 'User')
                                <li class="dropdown__item">
                                    <i class="ri-contract-right-line dropdown__icon"></i>
                                    <span class="dropdown__name"><a href="{{ route('logout') }}">Logout</a></span>
                                </li>
                            @elseif(auth()->user()->role === 'Admin')
                                <li class="dropdown__item">
                                    <i class="ri-message-3-line dropdown__icon"></i>
                                    <span class="dropdown__name"><a href="{{ route('dashboard') }}">Dashboard</a></span>
                                </li>
                                <li class="dropdown__item">
                                    <i class="ri-contract-right-line dropdown__icon"></i>
                                    <span class="dropdown__name"><a href="{{ route('logout') }}">Logout</a></span>
                                </li>
                            
                            @endif
                        </ul>
                        @endauth
                    </div>
                </div>                
            </div>
        </nav>
        <div class="header-tittle">
            <span style="--i:1">P</span>
            <span style="--i:2">u</span>
            <span style="--i:3">l</span>
            <span style="--i:4">a</span>
            <span style="--i:5">u</span>
            <span style="--i:6">B</span>
            <span style="--i:7">i</span>
            <span style="--i:8">n</span>
            <span style="--i:9">t</span>
            <span style="--i:10">a</span>
            <span style="--i:11">n</span>
        </div>
    </header>
    <!-- About -->
    <section id="about">
        <div class="about-container">
            <div class="image-gallery">
                <div class="image-box">
                    <img src="{{asset('assets-landingpage/Images/TB-img.jpg')}}" alt="image">
                    <h2 class="bintan">B</h2>
                </div>
                <div class="image-box">
                    <img src="{{asset('assets-landingpage/Images/gg-img.jpg')}}" alt="image">
                    <h2 class="bintan">I</h2>
                </div>
                <div class="image-box">
                    <img src="{{asset('assets-landingpage/Images/tri-img.jpg')}}" alt="image">
                    <h2 class="bintan">N</h2>
                </div>
                <div class="image-box">
                    <img src="{{asset('assets-landingpage/Images/pgl-img.jpg')}}" alt="image">
                    <h2 class="bintan">T</h2>
                </div>
                <div class="image-box">
                    <img src="{{asset('assets-landingpage/Images/Forest-Hole-3-4.jpg')}}" alt="image">
                    <h2 class="bintan">A</h2>
                </div>
                <div class="image-box">
                    <img src="{{asset('assets-landingpage/Images/vihara-patung-seribu.jpg')}}" alt="image">
                    <h2 class="bintan">N</h2>
                </div>
            </div>
            <div class="about-info">
            Pulau Bintan, berlokasi di Kepulauan Riau, Indonesia, adalah destinasi wisata yang mempesona dengan gabungan indahnya alam tropis dan warisan budaya yang kaya. Terkenal dengan pantainya yang memukau, Bintan menawarkan pengalaman liburan yang sempurna bagi para pencinta pantai dan pecinta petualangan.
            </div>
        </div>
    </section>
    <!-- Read more-->
    <section class="about" id="about">
        <div class="container">
          <div class="about-content">
            <div>
              <img src = "{{asset('assets-landingpage/Images/readmore-img.jpg')}}" alt = "" >
            </div>
            <div class = "about-text">
              <div class = "title">
                <h2>Bejalan</h2>
                <p>Bintan Island Tourism</p>
              </div>
              <p>Bejalan adalah perusahaan yang berkomitmen untuk memberikan pengalaman perjalanan yang tak terlupakan kepada pelanggan kami. Sebagai penyedia layanan pariwisata terkemuka, kami menghadirkan destinasi menakjubkan dan program perjalanan yang dirancang khusus untuk memenuhi keinginan dan ekspektasi Anda.
                </p>

                <a href="{{route('blog')}}" class="read-more-button">Read More <i class="f"></i>
                </a>
            </div>
          </div>
        </div>
      </section>
    <!-- Footer -->
    <footer>
        &copy;BEJALAN
    </footer>

    <!-- Parallax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="{{asset('assets-landingpage/parallax.js/parallax.js')}}"></script>
    <script src="{{asset('assets-landingpage/script.js')}}"></script>
</body>
</html>