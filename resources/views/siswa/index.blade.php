<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Anggota</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css')" />
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
          <table id="example" class="table table-hover">
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
                  <td>{{ $uids[$key] ?? 'N/A' }}</td>
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

        <script>
          let table = new DataTable('#example');
          $(document).ready( function () {
            $('example').DataTable();
          });
        </script>

      </div>
    </div>
  </div>
</div>
<!--/ Hoverable Table rows -->

@endsection
<script type="text/javascript" charset="UTF-8" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
</body>
</html>