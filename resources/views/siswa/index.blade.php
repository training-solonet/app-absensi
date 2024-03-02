<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabel Siswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
</head>

<body>

  @extends('layouts.app')
  @section('contents')

  <!-- Hoverable Table rows -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"></span> DATA SISWA PKL</h4>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#searchModal">
      Tampilkan Siswa Berdasarkan Jurusan
    </button>

    <!-- Modal -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel1">Pilih Jurusan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form method="GET" action="{{ route('siswa.index') }}">
            <div class="modal-body">
              <div class="row">
                <div class="col mb-3">
                  <label for="search" class="form-label">Jurusan:</label>
                  <select name="search" class="form-select" id="search">
                    <option value="">Semua Jurusan</option>
                    @foreach($majors as $major)
                    <option value="{{ $major->name }}">{{ $major->name }}</option>
                    @endforeach
                  </select>
                </div>
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

  @if (session('success'))
  <div class="alert alert-success">
      {{ session('success') }}
  </div>
  @endif

  <div class="card">
    <h5 class="card-header">Data Siswa PKL Aktif</h5>
      <div class="table-responsive text-nowrap">
        <div class="container mt-3">
        <table id="myTable" class="table table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Uid</th>
            <th>Jurusan</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          @forelse ($students as $key => $student)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $student->name }}</td>
                @if ($student->Uid)
                <td>{{ $student->Uid->uid }}</td>
                @else
                <td>Tidak Ada</td>
                @endif
                <td>{{ str_replace([
                  'Teknik Komputer Jaringan (TKJ)', 
                  'Sistem Informasi (SI)',
                  'Teknik Informatika (TI)',
                  'Rekayasa Perangkat Lunak (RPL)'],
                  ['TKJ', 'SI', 'TI', 'RPL'], $student->majors->name) }}</td>
                <td>
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#detailModal{{ $student->id }}">
                  Detail
                </button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $student->id }}">
                  Edit
              </button>
              </td>
            </tr>
            @include('siswa.show', ['student' => $student])
            @include('siswa.edit', ['student' => $student])
            </tr>
            @empty
            <div class="alert alert-danger">
              Data Siswa belum Tersedia.
            </div>
            @endforelse
          </tbody>          
        </table>
          <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
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