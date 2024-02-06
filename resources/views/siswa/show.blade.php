<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
</head>
<body>
@extends('layouts.app')
@section('contents')
<!-- Content wrapper -->
<div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4">Detail Data Siswa</h4>
              <!-- Examples -->
              <div class="row mb-5">
                <div class="col-md-6 col-lg-4 mb-3">
                  <div class="card h-100">
                  <div class="card-body">
                  <img
                        class="img-fluid d-flex mx-auto my-4"
                        src="{{ 'https://siswa.cvconnectis.com/images/'.$student->img }}"
                        alt="foto siswa"/>
                        <p class="card-text">Nama : {{ $student->name }}</p>
                        <!-- Tampilkan UID jika ada -->
                      @if ($student->Uid)
                        <p class="card-text">UID : {{ $student->Uid->uid }}</p>
                      @else
                        <p class="card-text">UID: Tidak Ada</p>
                      @endif
                        <p class="card-text">Alamat : {{ $student->address }}</p>
                        <p class="card-text">Jurusan : {{ $student->majors->name}}</p>
                        <p class="card-text">Asal Sekolah : {{ $student->school->name}}</p>
                    <!-- tambahkan informasi lain sesuai kebutuhan -->
                    </div>
                    <a href="{{ url('/siswa/') }}" class="btn btn-secondary">Close</a>
                  </div>
                </div>
              </div>
              <!-- Examples -->
              </div>
@endsection
</body>
</html>