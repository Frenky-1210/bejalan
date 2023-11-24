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
                <img src="{{asset('assets/images/crystal-populer.jpg')}}" alt="" class="image-populer" style="width: 369px; height: 373px; object-fit: cover;">
                <div class="card-overlay-popular">
                    <h1 class="title_card">Crystal Lagoon</h1>
                </div>
                <div class="box-overlay-popular">
                    <h1 class="card-title">Crystal Lagoon</h1>
                    <hr>
                    <p class="card-data">Crystall Lagoon adalah sebuah inovasi rekayasa dan desain arsitektur yang menghasilkan kolam renang buatan dengan air yang sangat jernih dan transparan, menyerupai keindahan dan keasrian air laut tropis. Kolam renang ini sering kali dilengkapi dengan pasir putih di sekelilingnya dan menciptakan suasana liburan eksotis. </p>
                </div>
            </article>
            
            <article class="card-article">
                <img src="{{asset('assets/images/Pantai Pengudang.jpg')}}" alt="" class="image-populer" style="width: 369px; height: 373px; object-fit: cover;">
                <div class="card-overlay-popular">
                    <h1 class="title_card">Pantai Pengudang</h1>
                </div> 
                <div class="box-overlay-popular">
                    <h1 class="card-title">Pantai Pengudang</h1>
                    <hr>
                    <p class="card-data">Pantai Pengudang menawarkan keindahan alam yang menakjubkan dengan pasir putih yang lembut, air laut yang jernih, dan pemandangan laut yang memukau. Terletak di Tlk. Sebong, Kabupaten Bintan, Kepulauan Riau, pantai ini menjadi tempat ideal untuk bersantai, berjemur, dan menikmati keindahan alam. </p>
                </div>
            </article>

            <article class="card-article">
                <img src="{{asset('assets/images/kampung-wisata.jpg')}}" alt="" class="image-populer" style="width: 369px; height: 373px; object-fit: cover;">
                <div class="card-overlay-popular">
                    <h1 class="title_card">Kampung Wisata Panglong</h1>
                </div>
                <div class="box-overlay-popular">
                    <h1 class="card-title">Kampung Wisata Panglong</h1>
                    <hr>
                    <p class="card-data">Kampung Wisata Panglong adalah destinasi wisata yang memukau, menyajikan pengalaman autentik kehidupan kampung dengan keindahan alam yang menawan. Terletak diTanjungpinang, Kota Tanjung Pinang, Kepulauan Riau, kampung ini memperkenalkan pengunjung pada kehidupan sehari-hari masyarakat setempat, tradisi, dan kebudayaan yang kaya.</p>
                </div>
            </article>

            <article class="card-article">
                <img src="{{asset('assets/images/Pantai Senggiling.jpg')}}" alt="" class="image-populer" style="width: 369px; height: 373px; object-fit: cover;">
                <div class="card-overlay-popular">
                    <h1 class="title_card">Pantai Senggiling</h1>
                </div>
                <div class="box-overlay-popular">
                    <h1 class="card-title">Pantai Senggiling</h1>
                    <hr>
                    <p class="card-data">Pantai berpasir putih ini memiliki lingkungan yang masih sangat asri, karena jarang terjamah manusia. Selain pasir putih, di sepanjang Pantai Senggiling juga terdapat jajaran batu karang yang seakan membingkai pantai.</p>
                </div>
            </article>

            <article class="card-article">
                <img src="{{asset('assets/images/Vihara-Avalokhi-Thesvara-Graha-Tanjungpinang.jpg')}}" alt="" class="image-populer" style="width: 369px; height: 373px; object-fit: cover;">
                <div class="card-overlay-popular">
                    <h1 class="title_card">Vihara Avalokitesvara Graha</h1>
                </div>
                <div class="box-overlay-popular">
                    <h1 class="card-title">Vihara Avalokitesvara Graha</h1>
                    <hr>
                    <p class="card-data">Vihara Avalokitesvara Graha atau merupakan salah satu wihara Buddha di Tanjungpinang, Kepulauan Riau, Indonesia. Wihara ini disebut sebagai wihara terbesar se-Asia Tenggara. Wihara ini dibangun oleh sebuah yayasan komunitas Tionghoa di Tanjungpinang untuk dijadikan sebagai tempat memperdalam ilmu agama, berguru dan belajar para biksu</p>
                </div>
            </article>

             <article class="card-article">
                <img src="{{asset('assets/images/Klenteng-Pohon-Banyan.jpg')}}" alt="" class="image-populer" style="width: 369px; height: 373px; object-fit: cover;">
                <div class="card-overlay-popular">
                    <h1 class="title_card">Vihara Pohon Banyan</h1>
                </div>
                <div class="box-overlay-popular">
                    <h1 class="card-title">Vihara Pohon Banyan</h1>
                    <hr>
                    <p class="card-data">Vihara Pohon Banyan adalah sebuah tempat ibadah umat Buddha yang terletak di Tanjungpinang. Wihara ini memiliki pohon banyan yang besar dan tua sebagai objek wisata yang menarik. Di dalam wihara terdapat patung-patung Buddha yang indah</p>
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
            @forelse($wisata as $value)
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
            @empty
                <p>No data found</p>
            @endforelse
        </div>
        <div class="paginate">
        {{ $wisata->links() }}
        </div>
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
                <p class="about-p2">Bejalan adalah perusahaan yang berkomitmen untuk memberikan pengalaman perjalanan yang tak terlupakan kepada pelanggan kami. Sebagai penyedia layanan pariwisata terkemuka, kami menghadirkan destinasi menakjubkan dan program perjalanan yang dirancang khusus untuk memenuhi keinginan dan ekspektasi Anda.                   
                </p>
            </div>
        </div>
        </div>
</div>

@endsection