@extends('layouts.dashboard')

@section('content')

<div class="card mb-4">
    <div class="d-flex align-items-center justify-content-between">
        <h5 class="card-header fs-4">Detail Pengajuan Merk</h5>
        <h6 class="card-header fw-bold"><span class="text-muted fw-light">Dashboard / Daftar Permohanan / </span> Detail Pengajuan Merk</h6>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="row justify-content-evenly">
                <!-- Brand Application Form -->
                    <div class="col-md-8">
                        <form id="formAccountSettings" action="{{ route('applicant.brands.update', ['brand' => $brand->id]) }}" method="POST" enctype="multipart/form-data" novalidate>
                            @csrf
                            @method('put')

                            <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">

                            <!-- Name -->
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="name" class="form-label">Nama Merk <span class="text-danger">*</span></label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" value="{{ old('name', $brand->name) }}" autofocus />
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
                                    <input class="form-control @error('address') is-invalid @enderror" type="text" id="address" name="address" value="{{ old('address', $brand->address) }}"/>
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
                                    <input class="form-control @error('owner') is-invalid @enderror" type="text" id="owner" name="owner" value="{{ old('owner', $brand->owner) }}"/>
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
                                    <input id="logoInput" class="form-control @error('logo_url') is-invalid @enderror" type="file" id="logo" name="logo_url" accept=".jpg, .png" onchange="imagePreview('logoInput', 'logoImagePreview')"/>
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

                            @if ( $status_history[0] == 'revision' )
                            <div class="mt-2 text-end">
                                <button type="submit" class="btn btn-primary me-2">
                                    Ajukan Revisi
                                </button>
                            </div>
                            @else
                            <div class="mt-2 text-end">
                                <button type="submit" class="btn btn-primary me-2" disabled>
                                    Ajukan Revisi
                                </button>
                                <span class="d-block mt-2 fw-bold">Saat ini anda belum bisa merivisi data permohonan anda</span>
                            </div>   
                            @endif

                        </form>
                    </div>
                    <div class="col-md-3">
                        <div class="row {{ $brand->lastStatus()->status == 'applied' ? '' : 'd-none' }}">
                            <div class="col p-0 rounded" style="height: 150px; background-color: #FDF7E7; border: 1px solid #F4D27B">
                                <div class="px-3 py-2" style="border-bottom: 1px solid #F4D27B; background-color: #FAECC6">
                                    <span class="text-dark fw-bold align-middle">Pesan</span>
                                </div>
                                <div class="text-dark px-3 py-2">
                                    {{ $brand->lastStatus()->message }}
                                </div>
                            </div>
                        </div>
                        <hr class="my-4">
                        
                        
                        <!-- File Review -->
                        <div class="row mb-4 text-center justify-content-center">
                            <div class="col-10 d-grid">
                                <h6 class="mb-2">Logo</h6>
                                <a href="{{ asset('storage/' . $brand->logo_url) }}" target="_blank" class="btn btn-dark rounded-pill"><i class="bx bx-link-external"></i> Lihat Logo</a>
                            </div>
                        </div>
                        <div class="row mb-4 text-center justify-content-center">
                            <div class="col-10 d-grid">
                                <h6 class="mb-2">Signature</h6>
                                <a href="{{ asset('storage/' . $brand->signature_url) }}" target="_blank" class="btn btn-dark rounded-pill"><i class="bx bx-link-external"></i> Lihat Tanda Tangan</a>
                            </div>
                        </div>
                        <div class="row mb-4 text-center justify-content-center">
                            <div class="col-10 d-grid">
                                <h6 class="mb-2">Surat Keterangan UMK</h6>
                                <a href="{{ asset('storage/' . $brand->certificate_url) }}" target="_blank" class="btn btn-dark rounded-pill"><i class="bx bx-link-external"></i> Buka File PDF</a>
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