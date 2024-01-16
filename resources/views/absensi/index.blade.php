<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Anggota</title>
</head>
<body>
@extends('layouts.app')

@section('contents')

<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4">Report Absensi</h4>
              <!-- Hoverable Table rows -->
              <div class="card">
                <h5 class="card-header">Data Absensi</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Masuk</th>
                        <th>Pulang</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
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