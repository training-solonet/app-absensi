<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
</head>
<body>
@extends('layouts.app')

@section('contents')

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Laporan Absensi</h4>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#searchModal">
      Filter Pencarian
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
            <div class="row g-2">
                <div class="col mb-0">
                    <label for="start_date" class="form-label">Awal Tanggal</label>
                    <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $searchStartDate }}" required>
                </div>
                <div class="col mb-0">
                    <label for="end_date" class="form-label">Masukan Tanggal</label>
                    <input type="date" name="end_date" id="end_date" value="{{ $searchEndDate }}" class="form-control">
                </div>
                <div class="col mb-0">
                    <label for="major" class="form-label">Jurusan</label>
                    <select name="search" class="form-select" id="search">
                        <option value="">Semua Jurusan</option>
                        @foreach($majors as $major)
                        <option value="{{ $major->id }}">{{ $major->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

    <!-- Hoverable Table rows -->
    <div class="card">
      <h5 class="card-header">Data Absensi
      @if(isset($formattedStartDate) && isset($formattedEndDate))
      (Data dari {{ $formattedStartDate }} hingga {{ $formattedEndDate }})
      @endif</h5>                
      <div class="table-responsive text-nowrap">
        <div class="container mt-3">
        <table id="myTable" class="table table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Jurusan</th>
              <th>Masuk</th>
              <th>Pulang</th>
              <th>Tanggal</th>
              <th>Keterangan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          <!-- Inisialisasi variabel penghitung -->
          @php
            $counter = 0; 
          @endphp
            @forelse ($absen as $key => $absensi)
            <!-- ketika yang data yang dipilih spesifict 1 jurusan -->
            @if( $jurusan > 0)
              <!-- hanya menampilkan data yang jurusannya sesuai yang dipilih -->
              @if( $absensi->students->majors->id == $jurusan)
              <!-- Menambah penghitung untuk jurusan tertentu -->
              @php
                $counter++; 
              @endphp
              <tr>
                  <td>{{ $counter }}</td>
                  <td>{{ $absensi->students->name }}</td>
                  <td>{{ $absensi->students->majors->name}}</td>
                  <td>{{ Carbon\Carbon::parse($absensi->waktu_masuk)->format('H:i:s') }}</td>
                  <td>{{ Carbon\Carbon::parse($absensi->waktu_keluar)->format('H:i:s') }}</td>
                  <td>{{ $absensi->tanggal }}</td>
                  <td>{{ $absensi->keterangan }}</td>
                  <td>
                  @if ($absensi->keterangan == 'Alfa' || $absensi->keterangan == 'Terlambat')
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $absensi->id }}">
                        Edit
                    </button>
                  @endif
                  </td>
                  </td>
              </tr>
              @include('absensi.edit', ['absensi' => $absensi])
              @endif
            @else 
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $absensi->students->name }}</td>
                <td>{{ $absensi->students->majors->name}}</td>
                <td>{{ Carbon\Carbon::parse($absensi->waktu_masuk)->format('H:i:s') }}</td>
                <td>{{ Carbon\Carbon::parse($absensi->waktu_keluar)->format('H:i:s') }}</td>
                <td>{{ $absensi->tanggal }}</td>
                <td>{{ $absensi->keterangan }}</td>
                <td>
                @if ($absensi->keterangan == 'Alfa' || $absensi->keterangan == 'Terlambat')
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $absensi->id }}">
                      Edit
                  </button>
                @endif
                </td>
                </td>
            </tr>
            @include('absensi.edit', ['absensi' => $absensi])
            @endif
            @empty
                <div class="alert alert-danger">
                    Data Absensi belum Tersedia.
                </div>
            @endforelse
          </tbody>
        </table>
        </div>
        <script
          src="https://code.jquery.com/jquery-3.7.1.min.js"
          integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
          crossorigin="anonymous"></script>
        <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script>
          let table = new DataTable('#myTable');
        </script>
      </div>
    </div>
  </div>
</div>
<!--/ Hoverable Table rows -->

@endsection
</body>
</html>