@extends('includes.masterblog')

@section('container')
<body>
    <div class="tour">
        <div class="tour-shape">
            <svg width="75%" height="70%" viewBox="0 0 1078 105" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M43.9863 29.518C25.8129 26.8085 27.8004 0 46.1746 0H1026.38C1044.44 0 1046.36 26.3685 1028.49 28.992C1012.61 31.3231 1011.61 53.8621 1027.23 57.5863L1060.6 65.5458C1083.66 71.048 1079.67 105 1055.96 105H20.1717C-3.60812 105 -7.52266 70.9107 15.6382 65.5206L45.1617 58.6496C61.1074 54.9386 60.1791 31.9322 43.9863 29.518Z" fill="#70480C" />
            </svg>
            <h2>TOUR</h2>
        </div>
        <div class="gambar-tour">
            <img src="{{asset('assets-tour/images/Rectangle 122.png')}}" alt="">
        </div>
    </div>
        <!-- Di dalam bagian "hero-section" -->
    <section class="hero-section">
        <div class="slide-container swiper">
            <div class="slide-content">
                <div class="card-wrapper swiper-wrapper">
                    @foreach($tour as $tourr)
                    <div class="card swiper-slide">
                        <div class="image-content">
                            <span class="overlay"></span>
                            <div class="card-image">
                                <img src="{{ asset('storage/'. $tourr->foto) }}" alt="" class="card-img">
                            </div>
                        </div>
                        <div class="card-content">
                            <h2 class="name">
                                {{$tourr->nama_tourguide}} 
                            </h2>
                            <p class="description">{{$tourr->pengalaman}}</p>

                            <!-- Ganti data-tourguide-id dengan ID yang sesuai -->
                            <button type="submit" class="button">View More</button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="swiper-button-next swiper-navBtn"></div>
            <div class="swiper-button-prev swiper-navBtn"></div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <!-- Di dalam bagian "destinasi-tour-section" -->
    <section class="destinasi-tour-section">
        <div class="title-destinasi">
            <h2>Destinasi Tour</h2>
        </div>
        <div class="tour-wrapper">
            @foreach($pesanan as $psn)
            <div class="tour-item-container">
                <div class="item-tour-image">
                    <img src="{{ asset('storage/'. $psn->wisata->gambar) }}" alt="" style="width: 360px; height: 315px;" class="tour-gambar">
                    <div class="h2-tittle">
                        <h2>{{$psn->wisata->tempat_wisata}}</h2>
                    </div>
                </div>
                <div class="item-tour-description">
                    <div class="item-utama">
                        <span><p>Jadwal</p></span>
                        <span><p>Waktu</p></span>
                        <span><p>Guide</p></span>
                        <span><p>Fasilitas</p></span>
                        <span><p>Harga</p></span>
                    </div>

                    <div class="deskripsi-detail">
                        <span class="detail-item jadwal">
                            <p>{{ \Carbon\Carbon::parse($psn->jadwal)->formatLocalized('%d %B %Y') }}</p>
                        </span>
                        <span class="detail-item waktu">
                            <p>{{ date('g:i A', strtotime($psn->waktu_start)) }} - {{ date('g:i A', strtotime($psn->waktu_end)) }}</p>
                        </span>
                        <span class="detail-item guide">
                            <p>{{$psn->tour->nama_tourguide}}</p>
                        </span>
                        <span class="detail-item fasilitas">
                            <p>{{$psn->fasilitas}}</p>
                        </span>
                        <span class="detail-item biaya">
                            <p>{{$psn->biaya}}</p>
                        </span>
                    </div>
                </div>
                <div class="button-bayar">
                    @if(auth()->check())
                        <a href="{{route('terjual')}}">Pesan</a>
                    @else
                        <button class="bayar" onclick="tampilkanNotifikasi()">Pesan</button>
                    @endif
                </div>
            </div>
            @endforeach
            <!-- Tambahkan tur lebih lanjut jika diperlukan -->
        </div>
    </section>
</body>

<!-- swiper js -->
<script src="{{asset('assets-tour/js/swiper-bundle.min.js')}}"></script>
<script src="{{asset('assets-tour/js/script.js')}}"></script>

<!-- Script JavaScript -->
<script>
    function tampilkanNotifikasi() {
        alert("Ingin melakukan pesanan? Ayo daftar terlebih dahulu supaya bisa melakukan pemesanan.");
    }
</script>

@endsection