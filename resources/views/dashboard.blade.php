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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">UI Elements /</span> Cards Basic</h4>

    <!-- Horizontal -->
    <h5 class="pb-1 mb-4">Absen Hari Ini</h5>
              <div class="row mb-5">
                <div class="col-md-4">
                        @foreach ($terlambat as $absensi)
                  <div class="card mb-2">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img class="card-img card-img-left"  src="../assets/img/elements/12.jpg" alt="Card image" />
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title">{{ $absensi->students->name }}</h5>
                          <p class="card-text">
                          Keterangan: {{ $absensi->keterangan }}
                          </p>
                        </div>
                      </div>
                    </div>
                    </div>
                   @endforeach
                </div>
                <div class="col-md-4">
                        @foreach ($alfa as $absensi)
                  <div class="card mb-2">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img class="card-img card-img-left" src="../assets/img/elements/12.jpg" alt="Card image" />
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title">{{ $absensi->students->name }}</h5>
                          <p class="card-text">
                          Keterangan: {{ $absensi->keterangan }}
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
              <!--/ Horizontal -->
            </div>
          </div>

    @endsection
</body>
</html>