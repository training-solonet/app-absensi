<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Uid</title>
</head>
<body> 
@extends('layouts.app')

@section('contents')

<!-- Content wrapper -->
<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>EDIT DATA UID SISWA</h4>

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Edit Data Uid</h5>
                    </div>
                    <div class="card-body">
                      <form>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" placeholder="John Doe" />
                          </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="button" class="btn btn-primary">Ubah</button>
                            <button type="cancel" class="btn btn-secondary">Close</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
        </div>
      @endsection
   </body>
</html>