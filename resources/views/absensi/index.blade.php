<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Report</title>
</head>
<body>
@extends('layouts.app')

@section('contents')

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Report Absensi</h4>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#searchModal">
      Cari Berdasarkan Tanggal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel1">Cari Data Absensi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <form method="GET" action="{{ route('absensi.index') }}">
            <div class="row">
              <div class="col mb-3">
                <label for="search_date" class="form-label">Masukan Tanggal</label>
                <input type="date" name="search_date" id="search_date" value="{{ $searchDate }}" class="form-control" >
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Cari</button>
          </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Hoverable Table rows -->
    <div class="card">
      <h5 class="card-header">Data Absensi</h5>                
      <div class="table-responsive text-nowrap">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Uid</th>
              <th>Nama</th>
              <th>Masuk</th>
              <th>Pulang</th>
              <th>Keterangan</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($absen as $key => $absensi)
              <tr>
                  <td>{{ $key + 1}}</td>
                  <td>{{ $uids[$key] ?? 'N/A' }}</td>
                  <td>{{ $Students[$key] ?? 'N/A' }}</td>
                  <td>{{ Carbon\Carbon::parse($absensi->waktu_masuk)->format('H:i:s') }}</td>
                  <td>{{ Carbon\Carbon::parse($absensi->waktu_keluar)->format('H:i:s') }}</td>
                  <td>{{ $absensi->keterangan }}</td>
                  </td>
              </tr>
            @empty
                <div class="alert alert-danger">
                    Data Absen belum Tersedia.
                </div>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
              <!--/ Hoverable Table rows -->

@endsection
</body>
</html>