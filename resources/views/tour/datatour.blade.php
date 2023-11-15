@extends ('includes.master')

@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <div>
                <h6 class="m-0 font-weight-bold text-primary">Data Tour Guide</h6>
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
                            <th>Nama Tour Guide</th>
                            <th>Umur</th>
                            <th>Jenis Kelamin</th>
                            <th>Pengalaman</th>
                            <th>Kontak</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tour as $tur)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{$tur->nama_tourguide}}</td>
                            <td>{{$tur->umur}}</td>
                            <td>{{$tur->jenis_kelamin}}</td>
                            <td>{{$tur->pengalaman}}</td>
                            <td>{{$tur->no_telp}}</td>
                            <td align="center">
                                <div class="btn-group" role="group" aria-label="Action">
                                    <form action="{{ route('tour.destroy', ['tour' => $tur->id]) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <div class="d-flex justify-content-center">
                                            <a href="#" class="badge btn-primary border-0 btn-sm mx-1 edit-button" data-toggle="modal" data-target="#editModal-{{ $tur->id }}">
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

            <form action="#" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" id="post_id">
                            
                            <div class="form-group">
                                <label for="tour" class="control-label">
                                    <i class="fas fa-user"></i> Nama Tour Guide
                                </label>
                                <input type="text" class="form-control @error('nama_tourguide') is-invalid @enderror" id="nama_tourguide-add" name="nama_tourguide" placeholder="Nama Tour Guide">
                                @error('nama_tourguide')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Umur -->
                            <div class="form-group">
                                <label for="age" class="control-label">
                                    <i class="fas fa-birthday-cake"></i> Umur
                                </label>
                                <input type="text" class="form-control @error('umur') is-invalid @enderror" id="umur-add" name="umur" placeholder="Umur">
                                @error('umur')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Jenis Kelamin -->
                            <div class="form-group">
                                <label for="gender" class="control-label">
                                    <i class="fas fa-venus-mars"></i> Jenis Kelamin
                                </label>
                                <select class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin-add" name="jenis_kelamin">
                                    <option value="Pria">Pria</option>
                                    <option value="Wanita">Wanita</option>
                                </select>
                                @error('jenis_kelamin')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Pengalaman -->
                            <div class="form-group">
                                <label class="control-label">
                                    <i class="fas fa-star"></i> Pengalaman
                                </label>
                                <textarea class="form-control @error('pengalaman') is-invalid @enderror" id="pengalaman-add" name="pengalaman" rows="4" placeholder="Pengalaman"></textarea>
                                @error('pengalaman')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <!-- No Telp -->
                            <div class="form-group">
                                <label for="hp" class="control-label">
                                    <i class="fas fa-phone"></i> No Telp
                                </label>
                                <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp-add" name="no_telp" placeholder="No Telp">
                                @error('no_telp')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Menambahkan input file untuk memilih gambar -->
                            <div class="form-group">
                                <label for="image-add" class="control-label">
                                    <i class="fas fa-image"></i> Choose Image
                                </label>
                                <img id="imagePreview" src="#" class="img-preview img-fluid mb-3 col-sm-5" alt="Preview" style="max-width: 50%; max-height: 300px; display: none;">
                                <input type="file" class="form-control @error('foto') is-invalid @enderror" id="image-add" name="foto" accept="image/*" onchange="previewImage()">
                                @error('foto')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
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

@foreach($tour as $tr)
<!-- Start Modal Edit -->
<div class="modal fade" id="editModal-{{ $tr->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 1000px;">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="btn-close btn-close-white" data-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('tour.update', ['tour' => $tr->id]) }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" value="{{$tr->id}}" id="tour_id">
                            
                            <div class="form-group">
                                <label for="nama_tourguide-edit" class="control-label">
                                    <i class="fas fa-user"></i> Nama Tour Guide
                                </label>
                                <input type="text" class="form-control @error('nama_tourguide') is-invalid @enderror" id="nama_tourguide-edit" name="nama_tourguide" value="{{$tr->nama_tourguide}}" placeholder="Nama Tour Guide">
                                @error('nama_tourguide')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Umur -->
                            <div class="form-group">
                                <label for="umur-edit" class="control-label">
                                    <i class="fas fa-birthday-cake"></i> Umur
                                </label>
                                <input type="text" class="form-control @error('umur') is-invalid @enderror" id="umur-edit" name="umur" value="{{$tr->umur}}" placeholder="Umur">
                                @error('umur')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Jenis Kelamin -->
                            <div class="form-group">
                                <label for="jenis_kelamin-edit" class="control-label">
                                    <i class="fas fa-venus-mars"></i> Jenis Kelamin
                                </label>
                                <select class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin-edit" name="jenis_kelamin">
                                    <option value="Pria" {{ $tr->jenis_kelamin == 'Pria' ? 'selected' : '' }}>Pria</option>
                                    <option value="Wanita" {{ $tr->jenis_kelamin == 'Wanita' ? 'selected' : '' }}>Wanita</option>
                                </select>
                                @error('jenis_kelamin')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Pengalaman -->
                            <div class="form-group">
                                <label class="control-label">
                                    <i class="fas fa-star"></i> Pengalaman
                                </label>
                                <textarea class="form-control @error('pengalaman') is-invalid @enderror" id="pengalaman-add" name="pengalaman" rows="4" placeholder="Pengalaman">{{ $tr->pengalaman}}</textarea>
                                @error('pengalaman')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <!-- No Telp -->
                            <div class="form-group">
                                <label for="hp" class="control-label">
                                    <i class="fas fa-phone"></i> No Telp
                                </label>
                                <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp-add" name="no_telp" value="{{ $tr->no_telp}}" placeholder="No Telp">
                                @error('no_telp')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Menambahkan input file untuk memilih gambar -->
                            <div class="form-group">
                                <label for="image-edit" class="control-label">
                                    <i class="fas fa-image"></i> Choose Image
                                </label>
                                @if($tur->foto)
                                    <img id="imgPreview" src="{{ asset('storage/'. $tr->foto) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="Preview" style="max-width: 50%; max-height: 300px; display: none;">
                                @else
                                    <img id="imgPreview" class="img-preview img-fluid mb-3 col-sm-5" alt="Preview" style="max-width: 50%; max-height: 300px; display: none;">
                                @endif

                                <input type="file" class="form-control @error('foto') is-invalid @enderror" id="image-edit" name="foto" accept="image/*" onchange="previewImagee()">
                                @error('foto')
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
