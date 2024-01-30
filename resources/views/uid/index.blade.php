<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel UID</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
</head>
<body> 
@extends('layouts.app')

@section('contents')

<!-- Hoverable Table rows -->
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">DATA UID SISWA</h4>
  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">Tambah UID</button>

<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createModal">Tambah UID</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('uid.store') }}">
          @csrf
        <div class="row">
          <div class="col mb-3">
          <label for="uid" class="form-label">UID</label>
          <input type="text" name="uid" id="uid" class="form-control" placeholder="Enter UID" required>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
    <div class="card">
      <h5 class="card-header">Data UID</h5>
        <div class="table-responsive text-nowrap">
          <div class="container mt-3">
          <table id="myTable" class="table table-hover">
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
                    <form id="delete-form-{{ $uid->uid }}" action="{{ route('uid.destroy', $uid->uid) }}" method="POST">
                    @csrf
                    @method('DELETE') 
                    <button type="button" class="btn btn-outline-danger" fdprocessedid="msacf" onclick="confirmDelete('{{ $uid->uid }}')">
                    <span class="tf-icons bx bx-trash-alt me-1"></span>
                    </button>
                    </form>
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
        <script>
        function confirmDelete(uidId) {
            if (confirm('Apakah Anda yakin ingin menghapus UID ini?')) {
                event.preventDefault();
                document.getElementById('delete-form-' + uidId).submit();
            }
        }
        </script>
        </div>
        <script
          src="https://code.jquery.com/jquery-3.7.1.min.js"
          integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
          crossorigin="anonymous"></script>
        <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script>
          let table = new DataTable('#myTable') ;
        </script>
      </div>
    </div>
  </div>
</div>
<!--/ Hoverable Table rows -->

@endsection
</body>
</html>