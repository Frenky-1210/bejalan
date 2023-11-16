@extends ('includes.master')

@section('container')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <div>
                <h6 class="m-0 font-weight-bold text-primary">Data Tempat Wisata</h6>
            </div>
            <div class="float-right">
                <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                    Tambah
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="datatable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Destinasi</th>
                            <th>Lokasi</th>
                            <th>Info</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($wisata as $item)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{$item->tempat_wisata}}</td>
                            <td>{{$item->lokasi}}</td>
                            <td align="center">
                                <a class="badge btn-info btn-sm btn-rounded btn-custom-size mx-1" data-toggle="modal" data-target="#infoModal{{ $item->id }}">
                                    <i class="fas fa-info"></i>
                                </a>
                            </td>
                            <td align="center">
                                <div class="btn-group" role="group" aria-label="Action">
                                    <form action="{{ route('wisata.destroy', ['wisatum' => $item->id]) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <div class="d-flex justify-content-center">
                                            <a href="#" class="badge btn-primary border-0 btn-sm mx-1" data-toggle="modal" data-target="#editModal-{{ $item->id }}">
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

@foreach($wisata as $items)
<!-- Info Modal -->
<div class="modal fade" id="infoModal{{ $items->id }}" tabindex="-1" role="dialog" aria-labelledby="popupLabel{{ $items->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="popupLabel{{ $items->id }}">Detail Data</h5>
                <button type="button" class="btn-close btn-close-white " data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h1>{{ $items->tempat_wisata }}</h1>
                <h3>{{ $items->lokasi }}</h3>
                <img class="mb-3 rounded" src="{{ asset('storage/' . $items->gambar) }}" alt="{{ $items->tempat_wisata }}" style="max-width: 100%; max-height: auto; transition: transform 0.3s;">
                <p>{{ $items->deskripsi }}</p>
                <h5>Sumber : {{ $items->sumber_data }}</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<!-- End Info Modal -->
@endforeach


<!-- Start Modal Add -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 500px;">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="btn-close btn-close-white" data-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="#" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="col-md-12"> <!-- Menghapus text-center agar label kembali ke kiri -->
                        <input type="hidden" id="post_id">
                        
                        <div class="form-group">
                            <label for="destinasi-add" class="control-label">
                                <i class="fas fa-building"></i>  Nama Tempat Wisata
                            </label>
                            <input type="text" class="form-control @error('tempat_wisata') is-invalid @enderror" id="destinasi-add" name="tempat_wisata" placeholder="Nama Tempat Wisata">
                            @error('tempat_wisata')
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Lokasi -->
                        <div class="form-group">
                            <label for="location-add" class="control-label">
                                <i class="fas fa-map-marker-alt"></i> Lokasi
                            </label>
                            <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="location-add" name="lokasi" placeholder="Lokasi">
                            @error('lokasi')
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Deskripsi -->
                        <div class="form-group">
                            <label class="control-label">
                                <i class="fas fa-star"></i> Deskripsi
                            </label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="descrip-add" name="deskripsi" rows="4" placeholder="Deskripsi"></textarea>
                            @error('deskripsi')
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Sumber -->
                        <div class="form-group">
                            <label for="sumber-add" class="control-label">
                                <i class="fas fa-info-circle"></i> Sumber Data
                            </label>
                            <input type="text" class="form-control @error('sumber_data') is-invalid @enderror" id="sumber-add" name="sumber_data" placeholder="Sumber Data">
                            @error('sumber_data')
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
                            <img id="imagePreview" src="#" class="img-preview img-fluid mb-3 col-sm-5" alt="Preview" style="max-width: 100%; max-height: 200px; display: none;">
                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="image-add" name="gambar" accept="image/*" onchange="previewImage()">
                            @error('gambar')
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success add_data" id="add">Tambah</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Add -->


@foreach($wisata as $wis)
<!-- Start Modal Edit -->
<div class="modal fade" id="editModal-{{ $wis->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 500px;">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('wisata.update', ['wisatum' => $wis->id]) }}" id="editForm" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @method('PUT')
                    @csrf
                    <div class="col-md-12">
                        <input type="hidden" name="id" value="{{$wis->id}}" id="wisata_id">
                        <div class="form-group">
                            <label for="tour" class="control-label">
                                <i class="fas fa-building"></i>  Nama Tempat Wisata
                            </label>
                            <input type="text" class="form-control @error('tempat_wisata') is-invalid @enderror" id="destinasi-edit" value="{{$wis->tempat_wisata}}" name="tempat_wisata" placeholder="Nama Tempat Wisata">
                            @error('tempat_wisata')
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Lokasi -->
                        <div class="form-group">
                            <label for="location" class="control-label">
                                <i class="fas fa-map-marker-alt"></i> Lokasi
                            </label>
                            <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="location-edit" name="lokasi" value="{{$wis->lokasi}}" placeholder="Lokasi">
                            @error('lokasi')
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Deskripsi -->
                        <div class="form-group">
                            <label class="control-label">
                                <i class="fas fa-star"></i> Deskripsi
                            </label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="descrip-edit" name="deskripsi" rows="4" placeholder="Deskripsi">{{$wis->deskripsi}}</textarea>
                            @error('deskripsi')
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Sumber -->
                        <div class="form-group">
                            <label for="sumber-edit" class="control-label">
                                <i class="fas fa-info-circle"></i> Sumber Data
                            </label>
                            <input type="text" class="form-control @error('sumber_data') is-invalid @enderror" id="sumber-edit" name="sumber_data" value="{{$wis->sumber_data}}" placeholder="Sumber Data">
                            @error('sumber_data')
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
                            @if($wis->gambar)
                                <img id="imgPreview" src="{{ asset('storage/'. $wis->gambar) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="Preview" style="max-width: 100%; max-height: 200px; display: none;">
                            @else
                                <img id="imgPreview" class="img-preview img-fluid mb-3 col-sm-5" alt="Preview" style="max-width: 100%; max-height: 200px; display: none;">
                            @endif
                            
                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="image-edit" name="gambar" accept="image/*" onchange="previewImage()">
                            @error('gambar')
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
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
