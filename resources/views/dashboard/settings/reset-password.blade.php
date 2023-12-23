@extends('layouts.dashboard')

@section('content')

<div class="card mb-4">
    <div class="d-flex align-items-center justify-content-between">
        <h5 class="card-header fs-4">Profil Pengguna</h5>
        <h6 class="card-header fw-bold"><span class="text-muted fw-light">Pengaturan /</span> Ganti Kata Sandi</h6>
    </div>
</div>

<h6 class="fw-bold py-3 mb-2"><span class="text-muted fw-light">Pengaturan /</span> Profil</h6>

<div class="row">
    <div class="col-md-8">
        <div class="card mb-4">
            <h5 class="card-header fs-4">Profil Pengguna</h5>
    
            <hr class="my-0" />
            <!-- Account -->
            <div class="card-body">
                <span class="d-block form-label mb-3">Foto Profil</span>
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <img src="{{ asset('storage/'.auth()->user()->photo_url) }}" alt="user-avatar" class="d-block rounded"
                        id="photoProfilePreview"
                        style="object-fit: cover; height: 200px; width: 200px; object-position: center" />
                    <div class="button-wrapper">
                        <label for="photoProfileInput" class="btn btn-primary me-2 mb-2" tabindex="0">
                            <span class="d-none d-sm-block">Pilih Foto</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                        </label>
                        <p class="text-muted mb-0 fs-6 fw-light">Foto Profil Anda sebaiknya memiliki rasio 1:1 <br> dengan
                            ukuran file tidak melebihi 2MB</p>
                    </div>
                </div>
                <div class="mt-2 flex justify-end d-none" id="photoProfileButton">
                    <form action="{{ route('profile.upload_image') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <input type="file" name="photo_url" id="photoProfileInput" class="account-file-input" hidden
                            accept="image/png, image/jpeg"
                            onchange="imagePreview('photoProfileInput', 'photoProfilePreview')" />
                        <input type="hidden" name="old_photo" value="{{ auth()->user()->photo_url }}">
                        <button type="submit" class="btn btn-outline-primary">Ubah Foto Profile</button>
                    </form>
                </div>
            </div>
    
            <div class="card-body">
                <form id="formAccountSettings" action="{{ route('profile.update') }}" method="POST" novalidate>
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" value="{{ old('name', auth()->user()->name) }}" autofocus />
                        </div>
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="email" class="form-label">E-mail</label>
                            <input class="form-control" type="text" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" disabled />
                            <span class="fs-6 fw-lighter">Demi keamanan akun anda, saat ini fitur ganti email belum tersedia.</a></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="organization" class="form-label">Headline</label>
                            <input type="text" class="form-control @error('headline') is-invalid @enderror" id="headline" name="headline" placeholder="Contoh: CEO at HKI UNS" value="{{ old('headline', auth()->user()->headline) }}" />
                            <span class="fs-6 fw-lighter">Bisa diisi dengan titel atau jabatan utama Anda.</a></span>
                            @error('headline')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="about_me" class="form-label">Tentang Saya</label>
                            <textarea class="form-control @error('about_me') @enderror" name="about_me" id="about_me" cols="30" rows="4" placeholder="Tuliskan sesuatu">{{ old('about_me', ) }}</textarea>
                            <span class="fs-6 fw-lighter">Tuliskan cerita singkat tentang diri Anda.</span>
                            @error('about_me')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
            <!-- /Account -->
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('assets/js/image-preview.js') }}"></script>
@endsection