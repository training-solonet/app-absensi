<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>dashboard</title>
</head>
<body>
    @extends('layouts.app')

    @section('contents')
 
    <!-- Content wrapper -->
    <div class="content-wrapper">

    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Absen Hari Ini</h4>

    <!-- Horizontal -->
      <div class="row mb-5">
        <div class="col-md-12">
          <div class="row">
            @foreach ($terlambat as $absensi)
            <div class="col-md-4">
              <div class="card mb-2">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img class="card-img card-img-left" src="{{ 'https://siswa.cvconnectis.com/images/'.$absensi->students->img }}" alt="Card image" />
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
                    <img style="width: 100px; height: 150px;" class="card-img card-img-left" src="{{ 'https://siswa.cvconnectis.com/images/'.$absensi->students->img }}" h7 alt="Card image" />
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
