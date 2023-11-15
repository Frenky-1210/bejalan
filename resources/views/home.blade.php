<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="{{asset('assets-landingpage/style.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap">
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
                    <li><a href=""><img src="{{asset('assets-landingpage/Images/youtube.png')}}" alt=""></a></li>
                    <li><a href=""><img src="{{asset('assets-landingpage/Images/github.png')}}" alt=""></a></li>
                    <li><a href=""><img src="{{asset('assets-landingpage/Images/instagram.png')}}" alt=""></a></li>
                </ul>
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
                    <img src="{{asset('assets-landingpage/Images/pgl-img.jpg')}}" alt="image">
                    <h2 class="bintan">A</h2>
                </div>
                <div class="image-box">
                    <img src="{{asset('assets-landingpage/Images/pgl-img.jpg')}}" alt="image">
                    <h2 class="bintan">N</h2>
                </div>
            </div>
            <div class="about-info">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit tempore obcaecati itaque qui dolores
                earum, numquam quos deserunt repellat dolorum reiciendis quam odit nisi ipsa doloremque tempora sit
                saepe commodi!
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
              <p>Pulau Bintan adalah sebuah surga tropis yang terletak di Kepulauan Riau, Indonesia. Dengan keindahan alam yang menakjubkan dan kekayaan budaya yang melimpah, Pulau Bintan telah menjadi destinasi wisata yang sangat populer bagi wisatawan yang mencari pengalaman liburan yang unik.

                
                
                </p>

                <a href="{{route('blog')}}" class="read-more-button">Read More <i class="f"></i>
                </a>
            </div>
          </div>
        </div>
      </section>
    <!-- Footer -->
    <footer>
        &copy;SMKN4 TANJUNGPINANG
    </footer>

    <!-- Parallax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="{{asset('assets-landingpage/parallax.js/parallax.js')}}"></script>
</body>
</html>