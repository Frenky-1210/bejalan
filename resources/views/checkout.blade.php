<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Pesanan</h1>
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{asset('assets/images/Danau-Biru.jpg')}}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Danau Biru</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <form action="#" method="POST">
                @csrf
                <div class="mb-3">
                    <fieldset disabled>
                        <label for="disabledTextInput">Name</label>
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="{{ auth()->user()->name }}">
                    </fieldset>
                </div>
                <div class="mb-3">
                    <fieldset disabled>
                        <label for="disabledTextInput">Destinasi</label>
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="Danau Biru">
                    </fieldset>
                </div>
                <div class="mb-3">
                    <label for="jumlah_tiket">Jumlah Tiket</label>
                    <input type="number" class="form-control" id="jumlah_tikey" placeholder="Jumlah Tiket">
                </div>
                <button type="submit" class="btn btn-primary">Check Out</button>
                <a href="{{route('tourguide')}}" type="button" class="btn btn-danger">Batal</a>
              </form>
              
            </div>
        </div>
    </div>
</body>
</html>