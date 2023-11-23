<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bejalan</title>

    <link rel="stylesheet" href="{{asset('assets-tour/css/style.css')}}">
    <!-- swiper css -->
    <link rel="stylesheet" href="{{asset('assets-tour/css/swiper-bundle.min.css')}}">
    
    <link rel="shortcut icon" href="{{asset('assets-dash/images/favicon.png')}}" />
    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link rel="stylesheet" href="{{asset('assets/style.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700;900&family=Poppins:wght@400;500;700&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bubblegum+Sans&family=Convergence&family=Doppio+One&family=Fredoka:wght@500&family=Hammersmith+One&family=Marko+One&family=Marmelad&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body>
    @include('partialsblog.navbar')
    @yield('container')
    <footer>
      <div class="social-links">
          <a href="#"><i class="fab fa-github"></i></a>
      </div>
      <span>Bejalan Blog page</span>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    
    <!-- Include Toastr from CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('assets/js/script-2.js')}}"></script>

    <script>
        toastr.options = {
          "progressBar" : true,
          "closeButton" : true,
        }
      
        @if (Session::has('done'))
          toastr.success("{{ Session::get('done') }}");
        @endif
    </script>

    <!-- Script JavaScript -->
    <script>
      function tampilkanNotifikasi() {
          Swal.fire({
              title: "Ingin Melakukan Pemesanan Tiket ? Ayo daftar terlebih dahulu",
              showClass: {
                  popup: `
                  animate__animated
                  animate__fadeInUp
                  animate__faster
                  `
              },
              hideClass: {
                  popup: `
                  animate__animated
                  animate__fadeOutDown
                  animate__faster
                  `
              }
          });
      }
  </script>
</body>
</html>