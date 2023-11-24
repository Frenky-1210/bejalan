<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Pesanan</title> 
    <style>
        #back-button{
            width: 100%;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="my-3 text-center">Invoice</h1>
        <div class="card mx-auto" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title text-center">Detail Pesanan</h5>
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
                    <tr>
                        <td>Status</td>
                        <td>: {{$check->status}}</td>
                    </tr>
                  </table>
                  <a href="{{route('tourguide')}}" type="button" class="btn btn-primary" id="back-button">Back</a>
              </div>
          </div>
      </div>
    </div>
</body>
</html>
