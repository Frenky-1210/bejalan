@extends('includes.master')
@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <div>
                <h6 class="m-0 font-weight-bold text-primary">Data Payment</h6>
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
                            <th>Nama</th>
                            <th>Id Pesanan</th>
                            <th>Jumlah Tiket</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($payment as $pay)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $pay->user->name }}</td>
                            <td>{{ $pay->pesanan_id }}</td>
                            <td>{{ $pay->jumlah_tiket }}</td>
                            <td>{{ $pay->total_harga }}</td>
                            <td>{{ $pay->status }}</td>
                            <td align="center">
                                <div class="btn-group" role="group" aria-label="Action">
                                    <form action="{{ route('payment.destroy', ['payment' => $pay->id]) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <div class="d-flex justify-content-center">
                                            <a href="#" class="badge btn-primary border-0 btn-sm mx-1 edit-button" data-toggle="modal" data-target="#">
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
@endsection

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
                                <input type="number" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp-add" name="no_telp" placeholder="No Telp">
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