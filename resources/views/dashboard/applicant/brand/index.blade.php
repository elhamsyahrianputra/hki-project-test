@extends('layouts.dashboard')

@section('style')
<!-- DataTables CSS -->
<link rel="stylesheet" rel href="https://cdn.jsdelivr.net/npm/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')

<div class="card mb-4">
    <div class="d-flex align-items-center justify-content-between">
        <h5 class="card-header fs-4">Daftar Pengajuan Merk</h5>
        <h6 class="card-header fw-bold"><span class="text-muted fw-light">Dashboard / </span> Daftar Permohonan</h6>
    </div>
</div>
<div class="card">
    <div class="p-4table-responsive text-nowrap">
        <table id="brandTable" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Nama Merk</th>
                    <th>Pemilik</th>
                    <th>Alamat</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($brands as $brand)
                <tr>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $brand->name }}</strong></td>
                    <td>{{ $brand->owner }}</td>
                    <td>{{ $brand->address }}</td>
                    <td>
                            @switch( $brand->lastStatus()->status )
                                @case('applied')
                                    <span class="badge bg-label-secondary me-1">diajukan</span>
                                    @break
                                @case('accepted')
                                    <span class="badge bg-label-success me-1">diterima</span>
                                    @break
                                @case('rejected')
                                    <span class="badge bg-label-danger me-1">ditolak</span>
                                    @break
                                @case('revision')
                                    <span class="badge bg-label-warning me-1">perlu direvisi</span>
                                    @break
                                @case('revised')
                                    <span class="badge bg-label-warning me-1">pengajuan revisi</span>
                                    @break
                            @endswitch
                    </td>
                    <td><a href="{{ route('applicant.brands.show', ['brand' => $brand->id]) }}" class="btn btn-outline-primary">Detail >></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

<!-- DataTables JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/datatables.net@1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
      $('#brandTable').DataTable({

      });
    });
</script>
@endsection