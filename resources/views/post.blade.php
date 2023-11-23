@extends('includes.masterpost')
@section('content')
    <header id="news-title">
        <div class="title-single">
            <h2>{{$wisata->tempat_wisata}}</h2>
        </div>
    </header>
    <div class="container" id="news-container">
        <div class="container-post">
            <div class="image-section">
                <img src="{{ asset('storage/' . $wisata->gambar) }}" alt="" class="smaller-image">
            </div>
            <div class="deskripsi-berita">
                <div class="paragraphic">
                    <p><i style="color: gray;">Saya adalah raden</i></p>
                    <br>
                    <p>{{$wisata->deskripsi}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
