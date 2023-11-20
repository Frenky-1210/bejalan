<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript" src="https://app.stg.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  <div class="container mt-2">
    <h1 class="text-center mb-4">Pesanan</h1>
    <div class="card mx-auto" style="width: 18rem;">
        <img class="card-img-top" src="{{asset('assets/images/Danau-Biru.jpg')}}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title text-center">Danau Biru</h5>
            <table class="table">
                <tr>
                    <td>Nama</td>
                    <td>: {{$check->user_id}}</td>
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
                <tr>
                    <td>Status</td>
                    <td>: {{$check->status}}</td>
                </tr>
              </table>
              <button type="submit" class="btn btn-primary" id="pay-button">Bayar</button>
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
                    alert("Pembayaran berhasil!"); console.log(result);
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
