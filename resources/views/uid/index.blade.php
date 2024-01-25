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
  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#basicModal">
  Tambah UID
</button>

<!-- Modal -->
<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Tambah UID</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col mb-3">
            <label for="nameBasic" class="form-label">UID</label>
            <input type="text" id="nameBasic" class="form-control" placeholder="Enter UID">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>
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
                    <a class="dropdown-item" href="/uid/{uid}/edit">
                    <i class="bx bx-edit-alt me-1"></i> Edit</a>
                    <a class="dropdown-item" href="/uid/{uid}/hapus">
                    <i class="bx bx-trash-alt me-1"></i> Hapus</a>
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