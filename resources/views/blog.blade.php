@extends('includes.masterblog')

@section('container')
<div class="container">
    <div class="box-container">
        <div class="box-title">
            <h2>Tempat populer Pulau Bintan</h2>
            <hr>
            <p>Berikut Adalah Destinasi wisata Yang Populer Dan Paling Banyak Di kunjungi Masyarakat</p>
        </div>
        <div class="box-populer">
            <article class="card-article">
                <img src="{{asset('assets/images/thumbnail.jpg')}}" alt="" class="image-populer">
                <div class="card-overlay-popular">
                    <h1 class="title_card">Crystal Lagoon</h1>
                </div>
                <div class="box-overlay-popular">
                    <h1 class="card-title">Crystal Lagoon</h1>
                    <hr>
                    <p class="card-data">Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae labore aut optio rem placeat molestias animi architecto dolorum sapiente consequuntur natus molestiae, modi ullam eveniet? Explicabo ipsa facere dolor quos?</p>
                </div>
            </article>
            
            <article class="card-article">
                <img src="{{asset('assets/images/thumbnail.jpg')}}" alt="" class="image-populer">
                <div class="card-overlay-popular">
                    <h1 class="title_card">Crystal Lagoon</h1>
                </div> 
                <div class="box-overlay-popular">
                    <h1 class="card-title">Crystal Lagoon</h1>
                    <hr>
                    <p class="card-data">Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae labore aut optio rem placeat molestias animi architecto dolorum sapiente consequuntur natus molestiae, modi ullam eveniet? Explicabo ipsa facere dolor quos?</p>
                </div>
            </article>

            <article class="card-article">
                <img src="{{asset('assets/images/thumbnail.jpg')}}" alt="" class="image-populer">
                <div class="card-overlay-popular">
                    <h1 class="title_card">Crystal Lagoon</h1>
                </div>
                <div class="box-overlay-popular">
                    <h1 class="card-title">Crystal Lagoon</h1>
                    <hr>
                    <p class="card-data">Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae labore aut optio rem placeat molestias animi architecto dolorum sapiente consequuntur natus molestiae, modi ullam eveniet? Explicabo ipsa facere dolor quos?</p>
                </div>
            </article>

            <article class="card-article">
                <img src="{{asset('assets/images/thumbnail.jpg')}}" alt="" class="image-populer">
                <div class="card-overlay-popular">
                    <h1 class="title_card">Crystal Lagoon</h1>
                </div>
                <div class="box-overlay-popular">
                    <h1 class="card-title">Crystal Lagoon</h1>
                    <hr>
                    <p class="card-data">Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae labore aut optio rem placeat molestias animi architecto dolorum sapiente consequuntur natus molestiae, modi ullam eveniet? Explicabo ipsa facere dolor quos?</p>
                </div>
            </article>

            <article class="card-article">
                <img src="{{asset('assets/images/thumbnail.jpg')}}" alt="" class="image-populer">
                <div class="card-overlay-popular">
                    <h1 class="title_card">Crystal Lagoon</h1>
                </div>
                <div class="box-overlay-popular">
                    <h1 class="card-title">Crystal Lagoon</h1>
                    <hr>
                    <p class="card-data">Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae labore aut optio rem placeat molestias animi architecto dolorum sapiente consequuntur natus molestiae, modi ullam eveniet? Explicabo ipsa facere dolor quos?</p>
                </div>
            </article>

             <article class="card-article">
                <img src="{{asset('assets/images/thumbnail.jpg')}}" alt="" class="image-populer">
                <div class="card-overlay-popular">
                    <h1 class="title_card">Crystal Lagoon</h1>
                </div>
                <div class="box-overlay-popular">
                    <h1 class="card-title">Crystal Lagoon</h1>
                    <hr>
                    <p class="card-data">Lorem ipsum dolor siti amet consectetur adipisicing elit. Recusandae labore aut optio rem placeat molestias animi architecto dolorum sapiente consequuntur natus molestiae, modi ullam eveniet? Explicabo ipsa facere dolor quos?</p>
                </div>
            </article>
        </div>
    </div>
</div>

<div class="container-2">
    <div class="box-title-wisata">
        <h2>Destinasi <span class="pulau-bintan">Pulau Bintan</span> </h2>
            <hr>
                <p>Bingung Mencari Destinasi Wisata Di Pulau Bintan? Berikut Ini Adalah Rekomendasi Destinasi Wisata Yang dapat Anda Pilih Di pulau Bintan! Selamat berwisata</p>
    </div>
    <div class="box-container-1">
        <div class="box-wisata">
            @foreach($wisata as $value)
            <article class="card-article-1">
                <img src="{{ asset('storage/'. $value->gambar) }}" alt="" class="image-populer-1" style="width: 369px; height: 373px;">
                <div class="box-overlay-popular-1">
                    <span class="hearth">
                        <i class="fa fa-heart"></i>
                    </span> 
                    <h1 class="card-title-1">{{ $value->tempat_wisata }}</h1>
                    <hr>
                    <p class="card-data-1">{{ Str::limit($value->deskripsi, 448) }}</p>
                    <a href="{{ route('post', ['id' => $value->id]) }}" class="button-wisata">Read More <i class="fa fa-arrow-right"></i></a>
                </div>
            </article>
            @endforeach
        </div>
    </div>
    <div class="custom-pagination">
        {{ $wisata->links() }}
    </div>
</div>

<div class="container-3">
    <div class="box-container-1">
        <div class="about">
            <div class="image-about">
                <img src="{{asset('assets/images/wisata-lagoi-bintan.jpg')}}" alt="" class="image-about">
            </div>
            <div class="about-deskripsi">
                <h1 class="about-title">
                    Bejalan
                </h1>
                <hr>
                <p class="about-p">Bintan Island Tourism</p>
                <p class="about-p2">Pulau Bintan adalah sebuah surga tropis yang terletak di Kepulauan Riau, Indonesia. Dengan keindahan alam yang menakjubkan dan kekayaan budaya yang melimpah, Pulau Bintan telah menjadi destinasi wisata yang sangat populer bagi wisatawan yang mencari pengalaman liburan yang unik.
                    Pulau Bintan menawarkan pantai-pantai pasir putih yang bersih, air laut biru yang jernih, dan matahari sepanjang tahun. Aktivitas air seperti snorkeling, selancar, dan berlayar di sekitar pulau-pulau kecil di sekitar Pulau Bintan sangat populer di antara pengunjung. Pulau ini juga dikenal karena lapangan golfnya yang menakjubkan, dengan pemandangan laut yang menakjubkan.                      
                </p>
            </div>
        </div>
        </div>
</div>

@endsection