<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('assets/styel.css')}}">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
         @import url('https://fonts.googleapis.com/css2?family=Bubblegum+Sans&family=Convergence&family=Doppio+One&family=Dosis:wght@300;600&family=Fredoka:wght@500&family=Hammersmith+One&family=Marko+One&family=Marmelad&family=Oxygen&family=Quicksand:wght@300;400;500;600;700&display=swap');
    </style>
</head>
<body>
    @include('partialspost.navbar')
    @yield('content')

    <footer>
        <span>
            <div class="social-links">
                <a href="#"><i class="fab fa-github"></i></a>
            </div>
            <span>Bejalan Blog page</span>
        </span>
    </footer>      
</body>
</html>