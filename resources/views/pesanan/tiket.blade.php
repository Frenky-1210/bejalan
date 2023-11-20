@extends ('includes.master')

@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <div>
                <h6 class="m-0 font-weight-bold text-primary">Data Pesanan</h6>
            </div>
            <div class="float-right">
                <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                    Tambah
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Destinasi</th>
                            <th>Tour Guide</th>
                            <th>Jadwal</th>
                            <th>Waktu</th>
                            <th>Fasilitas</th>
                            <th>Biaya</th>
                            <th>Kuota</th>
                            <th>Pesanan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pesanan as $pesan)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{$pesan->wisata->tempat_wisata}}</td>
                            <td>{{$pesan->tour->nama_tourguide}}</td>
                            <td>{{ \Carbon\Carbon::parse($pesan->jadwal)->formatLocalized('%d %B %Y') }}</td>
                            <td>{{ date('g:i A', strtotime($pesan->waktu_start)) }} - {{ date('g:i A', strtotime($pesan->waktu_end)) }}</td>
                            <td>{{$pesan->fasilitas}}</td>
                            <td>{{$pesan->biaya}}</td>
                            <td>{{$pesan->kuota}}</td>
                            <td>{{$pesan->pesanan}}</td>
                            <td align="center">
                                <div class="btn-group" role="group" aria-label="Action">
                                    <form action="{{ route('pesanan.destroy', ['pesanan' => $pesan->id]) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <div class="d-flex justify-content-center">
                                            <a href="#" class="badge btn-primary border-0 btn-sm mx-1 edit-button" data-toggle="modal" data-target="#editModal-{{$pesan->id}}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button class="badge btn-danger border-0 btn-sm mx-1 show_confirm">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Start Modal Add -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 1000px;">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="btn-close btn-close-white" data-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="#" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" id="post_id">
                
                            {{-- Destinasi --}}
                            <div class="form-group">
                                <label for="nama_destinasi-add" class="control-label">
                                    <i class="fas fa-map-marker-alt"></i> Nama Destinasi
                                </label>
                                <select id="nama_destinasi-add" name="wisata_id" class="form-control">
                                    <option value="">- Pilih -</option>
                                    @foreach($wisatas as $wisata)
                                        <option value="{{ $wisata->id }}">{{ $wisata->tempat_wisata }}</option>
                                    @endforeach
                                </select>
                                {{-- @error('nama_tourguide')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror --}}
                            </div>
                
                            {{-- Tour Guide --}}
                            <div class="form-group">
                                <label for="nama_tour-add" class="control-label">
                                    <i class="fas fa-user"></i> Tour Guide
                                </label>
                                <select id="nama_tour-add" name="tour_id" class="form-control">
                                    <option value="">- Pilih -</option>
                                    @foreach($tours as $tour)
                                        <option value="{{ $tour->id }}">{{ $tour->nama_tourguide }}</option>
                                    @endforeach
                                </select>
                                {{-- @error('nama_tourguide')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror --}}
                            </div>
                
                            <!-- Jadwal -->
                            <div class="form-group">
                                <label for="jadwal-add" class="control-label">
                                    <i class="fas fa-calendar-alt"></i> Jadwal
                                </label>
                                <input type="date" class="form-control @error('jadwal') is-invalid @enderror" id="jadwal-add" name="jadwal">
                                @error('jadwal')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                
                            <!-- Waktu -->
                            <div class="form-group">
                                <label for="waktu-start" class="control-label">
                                    <i class="fas fa-clock"></i> Waktu (Mulai)
                                </label>
                                <input type="time" class="form-control @error('waktu_start') is-invalid @enderror" id="waktu-start" name="waktu_start">
                                @error('waktu_start')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                
                            <div class="form-group">
                                <label for="waktu-end" class="control-label">
                                    <i class="fas fa-clock"></i> Waktu (Selesai)
                                </label>
                                <input type="time" class="form-control @error('waktu_end') is-invalid @enderror" id="waktu-end" name="waktu_end">
                                @error('waktu_end')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                
                        <div class="col-md-6">
                            <!-- Fasilitas -->
                            <div class="form-group">
                                <label class="control-label">
                                    <i class="fas fa-star"></i> Fasilitas
                                </label>
                                <textarea class="form-control @error('fasilitas') is-invalid @enderror" id="fasilitas-add" name="fasilitas" rows="4" placeholder="Fasilitas"></textarea>
                                @error('fasilitas')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                
                            <!-- Biaya -->
                            <div class="form-group">
                                <label for="biaya-add" class="control-label">
                                    <i class="fas fa-money-bill"></i> Biaya
                                </label>
                                <input type="text" class="form-control @error('biaya') is-invalid @enderror" id="biaya-add" name="biaya" placeholder="Biaya">
                                @error('biaya')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Kuota -->
                            <div class="form-group">
                                <label for="kuota-add" class="control-label">
                                    <i class="fas fa-users"></i> Kuota
                                </label>
                                <input type="number" class="form-control @error('kuota') is-invalid @enderror" id="kuota-add" name="kuota" placeholder="Kuota">
                                @error('kuota')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <input type="hidden" id="pesanan" name="pesanan" value="0">
                        </div>
                    </div>
                </div>                
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success add_data">Tambah</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Add -->  

@foreach($pesanan as $ps)
<!-- Start Modal Edit -->
<div class="modal fade" id="editModal-{{ $ps->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 1000px;">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="btn-close btn-close-white" data-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('pesanan.update', ['pesanan' => $ps->id]) }}" method="POST">
                <div class="modal-body">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" value="{{$ps->id}}" id="tour_id">
                            
                            {{-- Edit Destinasi --}}
                            <div class="form-group">
                                <label for="nama_destinasi-add" class="control-label">
                                    <i class="fas fa-map-marker-alt"></i> Destinasi
                                </label>
                                <select id="nama_destinasi-add" name="wisata_id" class="form-control">
                                    <option value="">- Pilih -</option>
                                    @foreach($wisatas as $destinasi)
                                        <option value="{{ $destinasi->id }}" {{ $ps->wisata_id == $destinasi->id ? 'selected' : '' }}>
                                            {{ $destinasi->tempat_wisata }}
                                        </option>
                                    @endforeach
                                </select>
                                {{-- @error('nama_tourguide')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror --}}
                            </div>

                            {{-- Edit Tour Guide --}}
                            <div class="form-group">
                                <label for="nama_tour-add" class="control-label">
                                    <i class="fas fa-user"></i> Tour Guide
                                </label>
                                <select id="nama_tour-add" name="tour_id" class="form-control">
                                    <option value="">- Pilih -</option>
                                    @foreach($tours as $tourGuide)
                                        <option value="{{ $tourGuide->id }}" {{ $ps->tour_id == $tourGuide->id ? 'selected' : '' }}>
                                            {{ $tourGuide->nama_tourguide }}
                                        </option>
                                    @endforeach
                                </select>
                                {{-- @error('nama_tourguide')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror --}}
                            </div>

                            <!-- Jadwal -->
                            <div class="form-group">
                                <label for="jadwal-add" class="control-label">
                                    <i class="fas fa-calendar-alt"></i> Jadwal
                                </label>
                                <input type="date" class="form-control @error('jadwal') is-invalid @enderror" value="{{$ps->jadwal}}" id="jadwal-add" name="jadwal">
                                @error('jadwal')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Waktu -->
                            <div class="form-group">
                                <label for="waktu-start" class="control-label">
                                    <i class="fas fa-clock"></i> Waktu (Mulai)
                                </label>
                                <input type="time" class="form-control @error('waktu_start') is-invalid @enderror" id="waktu-start" value="{{$ps->waktu_start}}" name="waktu_start">
                                @error('waktu_start')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                
                            <div class="form-group">
                                <label for="waktu-end" class="control-label">
                                    <i class="fas fa-clock"></i> Waktu (Selesai)
                                </label>
                                <input type="time" class="form-control @error('waktu_end') is-invalid @enderror" value="{{$ps->waktu_end}}" id="waktu-end" name="waktu_end">
                                @error('waktu_end')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <!-- Fasilitas -->
                            <div class="form-group">
                                <label class="control-label">
                                    <i class="fas fa-star"></i> Fasilitas
                                </label>
                                <textarea class="form-control @error('fasilitas') is-invalid @enderror" id="fasilitas-add" name="fasilitas" rows="4" placeholder="Fasilitas">{{$ps->fasilitas}}</textarea>
                                @error('fasilitas')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                
                            <!-- Biaya -->
                            <div class="form-group">
                                <label for="biaya-add" class="control-label">
                                    <i class="fas fa-money-bill"></i> Biaya
                                </label>
                                <input type="text" class="form-control @error('biaya') is-invalid @enderror" id="biaya-add" name="biaya" value="{{$ps->biaya}}" placeholder="Biaya">
                                @error('biaya')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Kuota -->
                            <div class="form-group">
                                <label for="kuota-add" class="control-label">
                                    <i class="fas fa-users"></i> Kuota
                                </label>
                                <input type="text" class="form-control @error('kuota') is-invalid @enderror" id="kuota-add" name="kuota" value="{{$ps->kuota}}" placeholder="Kuota">
                                @error('kuota')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success edit_data">Edit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
<!-- End Modal Edit -->
@endsection