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
            <!-- Tambahkan id untuk gambar dan teks destinasi wisata -->
            <img id="gambar-wisata" style="max-height: 200px; object-fit: cover; width: 100%;" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title" id="destinasi-wisata"></h5>
              <form action="{{ route('checkout') }}" method="POST" id="checkoutForm">
                @csrf
                <input type="hidden" name="wisata_id" id="wisata-id-input">
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

    {{-- <script>
        document.addEventListener("DOMContentLoaded", function () {
            const wisataIdInput = document.getElementById('wisata-id-input');
            if (wisataIdInput) {
                const wisataId = localStorage.getItem('wisataId');
                console.log('Wisata ID:', wisataId);
    
                // Selanjutnya, Anda dapat menggunakan nilai wisataId sesuai kebutuhan
                // Misalnya, atur nilai input hidden dengan nilai dari localStorage
                wisataIdInput.value = wisataId;
            } else {
                console.error("Elemen dengan ID 'wisata-id-input' tidak ditemukan.");
            }
        });
    </script>    --}}
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
