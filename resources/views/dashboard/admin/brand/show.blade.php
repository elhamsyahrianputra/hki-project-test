@extends('layouts.dashboard')

@section('style')
<style>
    .timeline-steps {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
    }

    .timeline-steps .timeline-step {
        align-items: center;
        display: flex;
        flex-direction: column;
        position: relative;
        margin: 1rem;
    }

    @media (min-width: 768px) {
        .timeline-steps .timeline-step:not(:last-child):after {
            content: "";
            display: block;
            border-top: 0.25rem dotted #3b82f6;
            width: 3.46rem;
            position: absolute;
            left: 7.5rem;
            top: 0.3125rem;
        }
        .timeline-steps .timeline-step:not(:first-child):before {
            content: "";
            display: block;
            border-top: 0.25rem dotted #3b82f6;
            width: 3.8125rem;
            position: absolute;
            right: 7.5rem;
            top: 0.3125rem;
        }
    }

    .timeline-steps .timeline-content {
        width: 10rem;
        text-align: center;
    }

    .timeline-steps .timeline-content .inner-circle {
        border-radius: 1.5rem;
        height: 1rem;
        width: 1rem;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background-color: #3b82f6;
    }

    .timeline-steps .timeline-content .inner-circle:before {
        content: "";
        background-color: #3b82f6;
        display: inline-block;
        height: 3rem;
        width: 3rem;
        min-width: 3rem;
        border-radius: 6.25rem;
        opacity: 0.5;
    }
    
</style>

<link rel="stylesheet" href="{{ asset('assets/extensions/@fortawesome/fontawesome-free/css/all.min.css') }}">
@endsection

@section('content')

<div class="card mb-4">
    <div class="d-flex align-items-center justify-content-between">
        <h5 class="card-header fs-4">Verifikasi Pengajuan Merk</h5>
        <h6 class="card-header fw-bold"><span class="text-muted fw-light">Dashbaord / Daftar Pengajuan /</span> Verifikasi Pengajuan Merk</h6>
    </div>
</div>

<!-- Application Step -->
<div class="card mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col">
                <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">

                    <div class="timeline-step">
                        <div class="timeline-content" data-toggle="popover" data-trigger="hover"
                            data-placement="top" title="">
                            <div class="text-success"><i class="fas fa-check-circle"></i></div>
                            <p class="h6 mt-3 mb-1">Pengajuan Merk</p>
                        </div>
                    </div>
                    {{-- {{ dd($status_history) }} --}}
                    <div class="timeline-step">
                        <div class="timeline-content" data-toggle="popover" data-trigger="hover"
                            data-placement="top" title="">
                                @if ($status_history[0] == 'applied')
                                    <div class="text-primary"><i class="fas fa-adjust"></i></div>
                                @elseif (in_array("accepted", $status_history) || in_array("revision", $status_history) || in_array("rejected", $status_history))
                                    <div class="text-success"><i class="fas fa-check-circle"></i></div>
                                @else
                                <i class="fas fa-ban"></i>
                                @endif

                                <p class="h6 mt-3 mb-1">Proses Verifikasi</p>
                            </a>

                        </div>
                    </div>

                    <div class="timeline-step">
                        <div class="timeline-content" data-toggle="popover" data-trigger="hover"
                            data-placement="top" title="">

                            @if ($status_history[0] == 'revision' || $status_history[0] == 'revised')
                                <div class="text-primary"><i class="fas fa-adjust"></i></div>
                            @elseif (in_array("rejected", $status_history) || (in_array("accepted", $status_history)))
                                <div class="text-success"><i class="fas fa-check-circle"></i></div>
                            @else
                            <i class="fas fa-ban"></i>
                            @endif

                            <p class="h6 mt-3 mb-1">Proses Revisi</p>
                        </div>
                    </div>
                    <div class="timeline-step mb-0">
                        <div class="timeline-content" data-toggle="popover" data-trigger="hover"
                            data-placement="top" title="">

                            @if ($status_history[0] == 'accepted')
                                <div class="text-success"><i class="fas fa-check-circle"></i></div>
                            @elseif ($status_history[0] == 'rejected')
                                <div class="text-danger"><i class="fas fa-times-circle"></i></div>
                            @else
                            <i class="fas fa-ban"></i>
                            @endif

                            @if ($status_history[0] == 'accepted')
                            <p class="h6 mt-3 mb-1">Ajuan Diterima</p>
                            @elseif ($status_history[0] == 'rejected')   
                            <p class="h6 mt-3 mb-1">Ajuan Ditolak</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="row">
                <div class="col-12">
                </div>
            </div>
    
            <div class="card-body">
                <div class="row justify-content-evenly">
                <!-- Brand Application Form -->
                    <div class="col-md-8">
                        <form id="formAccountSettings" action="{{ route('applicant.brands.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                            @csrf

                            <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">

                            <!-- Applicant -->
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="name" class="form-label">Nama Pemohon <span class="text-danger">*</span></label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" value="{{ $brand->user->name }}" disabled />
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Name -->
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="name" class="form-label">Nama Merk <span class="text-danger">*</span></label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" value="{{ old('name', $brand->name) }}" disabled />
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
                                    <input class="form-control @error('address') is-invalid @enderror" type="text" id="address" name="address" value="{{ old('address', $brand->address) }}" disabled />
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
                                    <input class="form-control @error('owner') is-invalid @enderror" type="text" id="owner" name="owner" value="{{ old('owner', $brand->owner) }}" disabled />
                                    @error('owner')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-3">
                        <div class="row mb-3">
                            <div class="col d-grid p-0">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verificationModal" {{ $status_history[0] == 'accepted' ||  $status_history[0] == 'rejected' ||  $status_history[0] == 'revision' ? 'disabled' : ''}}>Verifikasi Permohonan</button>
                            </div>
                        </div>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="verificationModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="verificationModalTitle">Verifikasi</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <hr>
                                    <form action="{{ route('admin.brands.update', ['brand' => $brand->id]) }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="modal-body">
                                            <div class="row align-items-center">
                                                <div class="col border-0 border-end">
                                                    <div class="table-responsive text-nowrap">
                                                        <table class="table table-striped text-center">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Nama Merk</th>
                                                                    <th>Logo</th>
                                                                    <th>similarity</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="table-border-bottom-0">
                                                                @foreach ($similarity_data as $data)
                                                                    
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td class="text-start">{{ $data['name'] }}</td>
                                                                    <td><img src="{{ $data['image_url'] }}" style="max-height: 60px;" alt="{{ $data['name'] }}"></td>
                                                                    <td>
                                                                        @switch($x = $data['similarity'])
                                                                            @case($x <= 100 && $x > 80 )
                                                                                <span class="fw-bold badge bg-label-danger">{{ $data['similarity'] }}</span>
                                                                                @break
                                                                            @case($x <= 80 && $x > 40)
                                                                                <span class="fw-bold badge bg-label-warning">{{ $data['similarity'] }}</span>
                                                                                @break
                                                                            @case($x <= 40 && $x >= 0)
                                                                                <span class="fw-bold badge bg-label-success">{{ $data['similarity'] }}</span>
                                                                                @break
                                                                        @endswitch
                                                                    </td>
                                                                </tr>

                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col border-0 border-start">
                                                    <div class="row mb-2">
                                                        <div class="col">
                                                            <span>Status Verifikasi</span>
                                                        </div>
                                                    </div>
                                                    <div class="row justify-content-center">
                                                        <div class="col-9">
                                                            <div class="d-flex justify-content-evenly">
                                                                <input type="radio" class="btn-check" name="status" id="accepted" value="accepted" autocomplete="off" required>
                                                                <label class="btn btn-outline-success" for="accepted">Diterima</label>
                                                                
                                                                <input type="radio" class="btn-check" name="status" id="revision" value="revision" autocomplete="off" required>
                                                                <label class="btn btn-outline-warning" for="revision">Revisi</label>
                 
                                                                <input type="radio" class="btn-check" name="status" id="rejected" value="rejected" autocomplete="off" required>
                                                                <label class="btn btn-outline-danger" for="rejected">Ditolak</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-5">
                                                        <div class="col">
                                                            <div>
                                                                <label for="message">Pesan <span class="text-danger">*</span></label>
                                                                <textarea name="message" id="message" class="form-control" cols="30" rows="4" placeholder="Silahkan berikan pesan untuk proses verifikasi ini" required></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Proses Verifikasi</button>
                                        </div>
                                    </form>
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

        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('assets/js/image-preview.js') }}"></script>
@endsection