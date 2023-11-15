<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('assets/css/style-regis.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Marko+One&family=Playfair+Display:wght@500;600;700;900&family=Poppins:wght@400;500;700&family=Quicksand:wght@300;400;500;600;700&display=swap">
</head>
<body>
    <div class="container">
        <div class="register-box">
            <div class="image-register">
                <img src="{{asset('assets/images/Rectangle_35-removebg-preview (1).png')}}" alt="">
            </div>
            <form action="{{ route('register-proses') }}" method="post">
                <h2>Sign Up</h2>
                @csrf
                <div class="input-tile">
                    <span><i class="fa-regular fa-user fa-xl"></i></span>
                    <input type="text" name="name" id="name" class="box" placeholder="Full Name" value="{{ old('name') }}" required>
                </div>
                @error('name')
                  <small>{{ $message }}</small>
                @enderror

                
                <div class="input-tile">
                    <span><i class="fa fa-key fa-xl"></i></span>
                    <input type="password" name="password" id="password" placeholder="Password" class="box" required>
                </div>

                <div class="input-tile">
                    <span><i class="fa fa-key fa-xl"></i></span>
                    <input type="password" name="password_confirmation" id="confirm_password" class="box" placeholder="Confirm Password" required>
                </div>
                @error('password')
                  <small>{{ $message }}</small>
                @enderror

                <div class="input-tile">
                    <span><i class="fa-regular fa-envelope fa-xl"></i></span>
                    <input type="email" name="email" id="email" class="box" placeholder="Email" value="{{ old('email') }}" required>
                </div>
                @error('email')
                    <small>{{ $message }}</small>
                @enderror

                <input type="hidden" name="role" id="role" value="User">

                <a href="{{route('login')}}">Have an Account? Login</a>
                <button type="submit" class="button-28" role="button">Sign In</button>
            </form>
        </div>
    </div>

    <script src="{{asset('assets/script.js')}}"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Include Toastr from CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        toastr.options = {
            "progressBar" : true,
            "closeButton" : true,
        }
        // Menampilkan pesan error jika ada
        @if(Session::has('failed'))
            toastr.error("{{ Session::get('failed') }}");
        @endif
    </script>
    
  <!-- MDB -->
  <script type="text/javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js">
  </script>
</body>
</html>


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Include Toastr from CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        toastr.options = {
            "progressBar" : true,
            "closeButton" : true,
        }
        // Menampilkan pesan error jika ada
        @if(Session::has('failed'))
            toastr.error("{{ Session::get('failed') }}");
        @endif
    </script>
    
  <!-- MDB -->
<script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js">
</script>