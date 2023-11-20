<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
  <script type="text/javascript"
  src="https://app.stg.midtrans.com/snap/snap.js"
data-client-key="{{config('midtrans.client_key')}}"></script>
<!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Pesanan</h1>
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{asset('assets/images/Danau-Biru.jpg')}}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Danau Biru</h5>
              <table>
                <tr>
                    <td>User Id</td>
                    <td>: {{$terjual->user_id}}</td>
                </tr>
                <tr>
                    <td>Id Pesanan</td>
                    <td>: {{$terjual->pesanan_id}}</td>
                </tr>
                <tr>
                    <td>Jumlah Tiket</td>
                    <td>: {{$terjual->jumlah_tiket}}</td>
                </tr>
                <tr>
                    <td>Total Harga</td>
                    <td>: {{$terjual->total_harga}}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>: {{$terjual->Status}}</td>
                </tr>
              </table>
              <button type="submit" class="btn btn-primary" id="pay-button">Check Out</button>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
          // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token.
          // Also, use the embedId that you defined in the div above, here.
          window.snap.embed('{{$snapToken}}', {
            embedId: 'snap-container',
            onSuccess: function (result) {
              /* You may add your own implementation here */
              alert("payment success!"); console.log(result);
            },
            onPending: function (result) {
              /* You may add your own implementation here */
              alert("wating your payment!"); console.log(result);
            },
            onError: function (result) {
              /* You may add your own implementation here */
              alert("payment failed!"); console.log(result);
            },
            onClose: function () {
              /* You may add your own implementation here */
              alert('you closed the popup without finishing the payment');
            }
          });
        });
      </script>
</body>
</html>