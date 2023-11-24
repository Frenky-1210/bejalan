<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="{{asset('assets-log/style.css')}}">
    <link rel="shortcut icon" href="{{asset('assets-dash/images/favicon.png')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <form action="{{route('login-auth')}}" class="form" method="post">
          @csrf
            <h2>Login</h2>
            <span class="sign-up">  
                <a href="{{ route('register') }}">Havent an account yet? Lets Sign Up</a>
            </span>
            <div class="input-tile">
                <span class="icon"><i class="fa fa-envelope"></i></span>
                <input type="email" name="email" class="box" placeholder="Enter Email">
            </div>
            <div class="input-tile">
                <span class="icon"><i class="fa fa-key"></i></span>
                <input type="password" name="password" class="box" placeholder="Enter Password">
            </div>
            <button class="button-56" role="button">Login</button>
        </form>
        <div class="side">
            <img src="{{asset('assets-log/images/9372532-removebg-preview (1).png')}}" alt="" class="newimg">
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Include Toastr from CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        toastr.options = {
          "progressBar" : true,
          "closeButton" : true,
        }
      
        @if (Session::has('success'))
          toastr.success("{{ Session::get('success') }}");
        @endif
      </script>

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
</body>
</html>