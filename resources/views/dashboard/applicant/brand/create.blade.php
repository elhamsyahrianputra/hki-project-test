@extends('layouts.dashboard')

@section('content')

<div class="card mb-4">
    <div class="d-flex align-items-center justify-content-between">
        <h5 class="card-header fs-4">Form Pengajuan Merk</h5>
        <h6 class="card-header fw-bold"><span class="text-muted fw-light">Dashboard / Daftar Permohanan / </span> Form Pengajuan Merk</h6>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">

            <div class="card-body">
                <div class="row justify-content-evenly">
                                    <!-- Brand Application Form -->
                <div class="col-md-8">
                    <form id="formAccountSettings" action="{{ route('applicant.brands.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf

                        <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">

                        <!-- Name -->
                        <div class="row">
                            <div class="mb-3 col">
                                <label for="name" class="form-label">Nama Merk <span class="text-danger">*</span></label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" value="{{ old('name') }}" autofocus />
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="row">
                            <div class="mb-3 col">
                                <label for="address" class="form-label">Alamat Usaha <span class="text-danger">*</span></label>
                                <input class="form-control @error('address') is-invalid @enderror" type="text" id="address" name="address" value="{{ old('address') }}"/>
                                @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Owner -->
                        <div class="row">
                            <div class="mb-3 col">
                                <label for="owner" class="form-label">Pemilik <span class="text-danger">*</span></label>
                                <input class="form-control @error('owner') is-invalid @enderror" type="text" id="owner" name="owner" value="{{ old('owner') }}"/>
                                @error('owner')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Logo -->
                        <div class="row">
                            <div class="mb-3 col">
                                <label for="logo" class="form-label">Logo (.jpg / .png) <span class="text-danger">*</span></label>
                                <input id="logoInpu" class="form-control @error('logo_url') is-invalid @enderror" type="file" id="logo" name="logo_url" accept=".jpg, .png" onchange="imagePreview('logoInpu', 'logoImagePreview')"/>
                                @error('logo_url')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Certificate -->
                        <div class="row">
                            <div class="mb-3 col">
                                <label for="certificate" class="form-label">Surat Keterangan UMK (.pdf)</label>
                                <input class="form-control @error('certificate_url') is-invalid @enderror" type="file" id="certificate" name="certificate_url" accept=".pdf"/>
                                @error('certificate_url')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Signature -->
                        <div class="row">
                            <div class="mb-3 col">
                                <label for="signature" class="form-label">Tanda Tanga (.jpg / .png) <span class="text-danger">*</span></label>
                                <input id="signatureInput" class="form-control @error('signature_url') is-invalid @enderror" type="file" id="signature" name="signature_url" accept=".jpg, .png" onchange="imagePreview('signatureInput', 'signatureImagePreview')"/>
                                @error('signature_url')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-2 text-end">
                            <button type="submit" class="btn btn-primary me-2">Ajukan Permohonan</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-3">
                    <div class="row mb-3">
                        <div class="col p-2 border border-3">
                            <div class="text-center">
                                <h6>Logo</h6>
                                <img id="logoImagePreview" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col p-2 border border-3">
                            <div class="text-center">
                                <h6>Signature</h6>
                                <img id="signatureImagePreview" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>

            <!-- Image Review -->
            
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('assets/js/image-preview.js') }}"></script>
@endsection