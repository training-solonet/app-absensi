<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
</head>
<body> 
  
@extends('layouts.app')
@section('contents')

<!-- Hoverable Table rows -->
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"></span> DATA ANGGOTA SISWA</h4>
    <div class="card">
      <h5 class="card-header">Data Siswa PKL Aktif</h5>
        <div class="table-responsive text-nowrap">
          <div class="container mt-3">
          <table id="myTable" class="table table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>UID</th>
              <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($Students as $key => $student)
              <tr>
                  <td>{{ $key + 1 }}</td>
                  <td>{{ $student->name }}</td>
                  <td>{{ $student->uid}}</td>
                  <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('siswa.edit', $student->id) }}">
                    <i class="bx bx-edit-alt me-1"></i> Edit</a>
                  </div>
                </div>
                </td>
              </tr>
            @empty
            <div class="alert alert-danger">
                Data Post belum Tersedia.
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