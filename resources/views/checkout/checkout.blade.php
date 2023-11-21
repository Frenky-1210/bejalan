<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Check Out</title> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="my-3 text-center">Pesanan</h1>
        <div class="card mx-auto w-75" style="width: 18rem;">
            <img style="max-height: 200px; object-fit: cover; width: 100%;" class="card-img-top" src="{{ asset('assets/images/Danau-Biru.jpg') }}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Danau Biru</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <form action="{{ route('checkout') }}" method="POST" id="checkoutForm">
                @csrf
                <div class="mb-3">
                    <label for="name">Nama</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ auth()->user()->name }}" placeholder="Nama" readonly>
                </div>
                <div class="mb-3">
                    <label for="pesanan">Pesanan ID</label>
                    <input type="text" class="form-control" id="pesanan" name="pesanan" placeholder="Pesanan ID" readonly>
                </div>                
                <div class="mb-3">
                    <label for="jumlah_tiket">Jumlah Tiket</label>
                    <input type="number" class="form-control" id="jumlah_tiket" name="jumlah_tiket" placeholder="Jumlah Tiket" required>
                </div>
                <button type="submit" class="btn btn-primary">Pesan</button>
                <a href="{{ route('tourguide') }}" type="button" class="btn btn-danger">Batal</a>
            </form>            
            </div>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ambil nilai pesanan_id dari URL
            var urlParams = new URLSearchParams(window.location.search);
            var pesananId = urlParams.get('pesanan_id');

            // Set nilai pesanan_id ke input pesanan
            document.getElementById('pesanan').value = pesananId;
        });
    </script>
</body>
</html>
