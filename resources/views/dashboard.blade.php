<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>dashboard</title>
  <style>
    .card-img {
      object-fit: cover;  /* Menyesuaikan gambar agar terlihat dengan baik di area yang ditentukan */
    }
  </style>
</head>
<body>
    @extends('layouts.app')

    @section('contents')
 
    <!-- Content wrapper -->
    <div class="content-wrapper">

    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Absen Hari Ini</h4>
      @if($terlambat->isEmpty() && $alfa->isEmpty() && !$hadir->isEmpty())
      <div class="alert alert-success" role="alert">
          Semua siswa hadir hari ini
      </div>
      @endif
      @if($terlambat->isEmpty() && $alfa->isEmpty() && $hadir->isEmpty())
      <div class="alert alert-info" role="alert">
          Tidak ada siswa yang melakukan absensi hari ini
      </div>
      @endif
      @if($terlambat->isEmpty() && !$alfa->isEmpty())
      <div class="alert alert-danger" role="alert">
          Tidak ada siswa yang terlambat hari ini
      </div>
      @endif
      @if(!$terlambat->isEmpty() && $alfa->isEmpty())
      <div class="alert alert-secondary" role="alert">
          Tidak ada siswa yang alfa hari ini
      </div>
      @endif
    <!-- Horizontal -->
      <div class="row mb-5">
        <div class="col-md-12">
          <div class="row">
            @foreach ($terlambat as $absensi)
            <div class="col-md-4">
              <div class="card mb-2">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img class="card-img card-img-left" src="{{ 'https://siswa.cvconnectis.com/images/thumbnail/'.$absensi->students->img }}" style="width: 115px; height: 155px;" alt="Card image" />
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h7 class="card-title">{{ $absensi->students->name }}</h7>
                      <p class="card-text">
                      Keterangan: {{ $absensi->keterangan }}
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            @foreach ($alfa as $absensi)
            <div class="col-md-4">
              <div class="card mb-2">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img class="card-img card-img-left" src="{{ 'https://siswa.cvconnectis.com/images/thumbnail/'.$absensi->students->img }}" style="width: 115px; height: 155px;" alt="Card image" />
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h7 class="card-title">{{ $absensi->students->name }}</h7>
                      <p class="card-text">
                      Keterangan: Kemarin {{ $absensi->keterangan }}
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
      <!--/ Horizontal -->
    </div>
  </div>

    @endsection
</body>
</html>
