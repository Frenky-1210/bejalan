@extends('includes.master')
@section('container')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <div>
                <h6 class="m-0 font-weight-bold text-primary">Data Translator</h6>
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
                            <th>Nama Translator</th>
                            <th>Umur</th>
                            <th>Bahasa Native</th>
                            <th>Bahasa yang Dikuasai</th>
                            <th>Pengalaman</th>
                            <th>Kontak</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($translator as $trans)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{$trans->name}}</td>
                            <td>{{$trans->age}}</td>
                            <td>{{$trans->native_language}}</td>
                            <td>{{$trans->language_skill}}</td>
                            <td>{{$trans->experience}}</td>
                            <td>{{$trans->contact}}</td>
                            <td align="center">
                                <div class="btn-group" role="group" aria-label="Action">
                                    <form action="{{ route('translator.destroy', ['translator' => $trans->id]) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <div class="d-flex justify-content-center">
                                            <a href="#" class="badge btn-primary border-0 btn-sm mx-1 edit-button" data-toggle="modal" data-target="#editModal-{{ $trans->id }}">
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
                            
                            {{-- Nama --}}
                            <div class="form-group">
                                <label for="name-add" class="control-label">
                                    <i class="fas fa-user"></i> Nama Translator
                                </label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name-add" name="name" placeholder="Nama Translator">
                                @error('name')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Umur -->
                            <div class="form-group">
                                <label for="age-add" class="control-label">
                                    <i class="fas fa-birthday-cake"></i> Umur
                                </label>
                                <input type="text" class="form-control @error('age') is-invalid @enderror" id="age-add" name="age" placeholder="Umur">
                                @error('age')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Native Language -->
                            <div class="form-group">
                                <label for="native-add" class="control-label">
                                    <i class="fas fa-language"></i> Bahasa Native
                                </label>
                                <input type="text" class="form-control @error('native_language') is-invalid @enderror" id="native-add" name="native_language" placeholder="Bahasa Native">
                                @error('native_language')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            {{-- Language Skill --}}
                            <div class="form-group">
                                <label for="skill-add" class="control-label">
                                    <i class="fas fa-language"></i> Bahasa yang dikuasai
                                </label>
                                <input type="text" class="form-control @error('language_skill') is-invalid @enderror" id="skill-add" name="language_skill" placeholder="Bahasa yang dikuasai">
                                @error('language_skill')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <!-- Pengalaman -->
                            <div class="form-group">
                                <label class="control-label">
                                    <i class="fas fa-star"></i> Pengalaman
                                </label>
                                <textarea class="form-control @error('experience') is-invalid @enderror" id="expert-add" name="experience" rows="4" placeholder="Pengalaman"></textarea>
                                @error('experience')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- No Telp -->
                            <div class="form-group">
                                <label for="contact-add" class="control-label">
                                    <i class="fas fa-phone"></i> No Telp
                                </label>
                                <input type="text" class="form-control @error('contact') is-invalid @enderror" id="contact-add" name="contact" placeholder="No Telp">
                                @error('contact')
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
                                <input type="file" class="form-control @error('picture') is-invalid @enderror" id="image-add" name="picture" accept="image/*" onchange="previewImage()">
                                @error('picture')
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


@foreach($translator as $speaker)
<!-- Start Modal Edit -->
<div class="modal fade" id="editModal-{{ $speaker->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 1000px;">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="btn-close btn-close-white" data-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('translator.update', ['translator' => $speaker->id]) }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" value="{{$speaker->id}}" id="speaker_id">
                            
                            <div class="form-group">
                                <label for="name-edit" class="control-label">
                                    <i class="fas fa-user"></i> Nama Translator
                                </label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name-edit" name="name" value="{{$speaker->name}}" placeholder="Nama Translator">
                                @error('name')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Umur -->
                            <div class="form-group">
                                <label for="age-edit" class="control-label">
                                    <i class="fas fa-birthday-cake"></i> Umur
                                </label>
                                <input type="text" class="form-control @error('age') is-invalid @enderror" id="age-edit" name="age" value="{{$speaker->age}}" placeholder="Umur">
                                @error('age')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Native Language -->
                            <div class="form-group">
                                <label for="native-edit" class="control-label">
                                    <i class="fas fa-language"></i> Bahasa Native
                                </label>
                                <input type="text" class="form-control @error('native_language') is-invalid @enderror" id="native-edit" name="native_language" value="{{$speaker->native_language}}" placeholder="Bahasa Native">
                                @error('native_language')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            {{-- Language Skill --}}
                            <div class="form-group">
                                <label for="skill-edit" class="control-label">
                                    <i class="fas fa-language"></i> Bahasa yang dikuasai
                                </label>
                                <input type="text" class="form-control @error('language_skill') is-invalid @enderror" id="skill-edit" name="language_skill" value="{{$speaker->language_skill}}" placeholder="Bahasa yang dikuasai">
                                @error('language_skill')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <!-- Pengalaman -->
                            <div class="form-group">
                                <label class="control-label">
                                    <i class="fas fa-star"></i> Pengalaman
                                </label>
                                <textarea class="form-control @error('experience') is-invalid @enderror" id="expert-edit" name="experience" rows="4" placeholder="Pengalaman">{{$speaker->experience}}</textarea>
                                @error('experience')
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- No Telp -->
                            <div class="form-group">
                                <label for="contact-add" class="control-label">
                                    <i class="fas fa-phone"></i> No Telp
                                </label>
                                <input type="text" class="form-control @error('contact') is-invalid @enderror" id="contact-add" name="contact" value="{{$speaker->contact}}" placeholder="No Telp">
                                @error('contact')
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
                                @if($speaker->picture)
                                    <img id="imgPreview" src="{{ asset('storage/'. $speaker->picture) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="Preview" style="max-width: 50%; max-height: 300px; display: none;">
                                @else
                                    <img id="imgPreview" class="img-preview img-fluid mb-3 col-sm-5" alt="Preview" style="max-width: 50%; max-height: 300px; display: none;">
                                @endif

                                <input type="file" class="form-control @error('picture') is-invalid @enderror" id="image-edit" name="picture" accept="image/*" onchange="previewImagee()">
                                @error('picture')
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




