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

    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-8 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h3 class="card-title text-primary">Selamat Datang 🎉</h3>
                          <p class="mb-4">
                          Anda Berhasil Login
                          </p>
                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="../assets/img/illustrations/man-with-laptop-light.png"
                            height="140"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png"
                          />
                        </div>
                      </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4 text-center text-sm-left">
                  <div id="orderStatisticsChart"></div>
                </div>
                </div>
              <div class="row">
               <!-- Order Statistics -->
                <div class="col-md-6 col-lg-4 order-1 mb-4">
                  <div class="card h-100">
                    <div class="card-header">
                      <div class="card-title mb-0">
                        <h5 class="m-0 mb-0">Siswa hadir hari ini</h5>
                      </div>
                    </div>
                    <div class="card-body">
                      <ul class="p-0 m-0">
                      @forelse($hadir as $absen)
                      <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-primary"><i class="bx bx-user"></i>
                          </span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">{{ $absen->students->name }}</h6>
                              <small class="text-muted">{{ $absen->keterangan }}</small>
                              @empty
                              <div class="text-primary">
                                "Tidak ada siswa yang hadir hari ini"
                              </div>
                              @endforelse
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                <!--/ Order Statistics -->

                <!-- Expense Overview -->
                <div class="col-md-6 col-lg-4 order-1 mb-4">
                  <div class="card h-100">
                    <div class="card-header">
                    <div class="card-title mb-0">
                        <h5 class="m-0 mb-0">Siswa terlambat hari ini</h5>
                      </div>
                      <div class="card-body px-0">
                      <ul class="p-0 m-0">
                      @forelse($terlambat as $absen) 
                      <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-danger"><i class="bx bx-user"></i>
                          </span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2"> 
                              <h6 class="mb-0">{{ $absen->students->name }}</h6>
                              <small class="text-muted">{{ $absen->keterangan }}</small>
                              @empty
                              <div class="text-danger">
                                "Tidak ada siswa yang terlambat hari ini"
                              </div>
                              @endforelse
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
        <!--/ Expense Overview -->
        

             <!-- Expense Overview -->
             <div class="col-md-6 col-lg-4 order-1 mb-4">
                  <div class="card h-100">
                    <div class="card-header">
                    <div class="card-title mb-0">
                        <h5 class="m-0 mb-0">Siswa alfa hari ini</h5>
                      </div>
                      <div class="card-body px-0">
                      <ul class="p-0 m-0">
                         @forelse($alfa as $absen)  
                      <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-secondary"><i class="bx bx-user"></i>
                          </span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">  
                              <h6 class="mb-0">{{ $absen->students->name }}</h6>
                              <small class="text-muted">{{ $absen->keterangan }}</small>
                              @empty
                              <div class="text-secondary">
                                "Tidak ada siswa yang alfa hari ini"
                              </div>
                              @endforelse
                            </div>
                            </div>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>  
        <!--/ Expense Overview -->
        </div>
      </div>
        @endsection
</body>
</html>