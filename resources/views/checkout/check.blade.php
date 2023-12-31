<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        .card {
            border-radius: 15px; /* Menambahkan radius pada card */
            background-color: #f5f5f5; /* Warna latar belakang card */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Efek bayangan pada card */
            margin-top: 20px; /* Jarak atas card dari elemen sebelumnya */
        }

        .card-img-top {
            border-top-left-radius: 15px; /* Menambahkan radius pada sudut kiri atas gambar */
            border-top-right-radius: 15px; /* Menambahkan radius pada sudut kanan atas gambar */
        }

        .card-body {
            padding: 20px; /* Padding pada bagian dalam card */
        }

        .table {
            margin-bottom: 0; /* Menghilangkan margin bawah dari tabel */
        }

        #pay-button {
            width: 100%; /* Melebar button sesuai lebar card */
            margin-bottom: 10px;
        }

        #back-button {
            width: 100%; /* Melebar button sesuai lebar card */
        }

    </style>

    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript"
        src={{config('midtrans.snap_url')}}
        data-client-key={{config('midtrans.client_key')}}></script>
<!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-2">
        <h1 class="text-center mb-4">Pesanan</h1>
        <div class="card mx-auto" style="width: 20rem;">
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Nama</td>
                        <td>: {{$check->user->name}}</td>
                    </tr>
                    <tr>
                        <td>Id Pesanan</td>
                        <td>: {{$check->pesanan_id}}</td>
                    </tr>
                    <tr>
                        <td>Jumlah Tiket</td>
                        <td>: {{$check->jumlah_tiket}}</td>
                    </tr>
                    <tr>
                        <td>Total Harga</td>
                        <td>: Rp {{$check->total_harga}}</td>
                    </tr>
                </table>
                <div class="btn-container">
                    <button type="submit" class="btn btn-primary" id="pay-button">Bayar</button>
                    <a href="{{route('tourguide')}}" type="button" class="btn btn-danger" id="back-button">Batal</a>
                </div>
              </div>
          </div>
          <!-- Pindahkan #snap-container ke sini -->
          <div id="snap-container"></div>
    </div>
    
  
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            snap.pay("{{$snapToken}}", {
                onSuccess: function (result) {
                    alert("Pembayaran berhasil!");
                    window.location.href = '/invoice/{{$check->id}}'
                    console.log(result);
                },
                onPending: function (result) {
                    alert("Menunggu pembayaran!"); console.log(result);
                },
                onError: function (result) {
                    alert("Pembayaran gagal!"); console.log(result);
                },
                onClose: function () {
                    alert('Anda menutup popup tanpa menyelesaikan pembayaran');
                }
            });
        });
    });
</script>


</body>
</html>
