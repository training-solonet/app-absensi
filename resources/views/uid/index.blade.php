<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel UID</title>
</head>
<body> 
@extends('layouts.app')

@section('contents')

<!-- Hoverable Table rows -->
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"></span> DATA UID SISWA</h4>
    <div class="card">
      <h5 class="card-header">Data UID</h5>
        <div class="table-responsive text-nowrap">
          <table id="example" class="table table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>UID</th>
              <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($uids as $key => $uid)
              <tr>
                  <td>{{ $key + 1 }}</td>
                  <td>{{ $uid->uid }}</td>
                  <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="/siswa/{siswa}/edit">
                    <i class="bx bx-edit-alt me-1"></i> Edit</a>
                  </div>
                </div>
                </td>
              </tr>
            @empty
            <div class="alert alert-danger">
                Data UID belum Tersedia.
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