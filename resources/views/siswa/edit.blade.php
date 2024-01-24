<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Anggota</title>
</head>
<body> 
@extends('layouts.app')

@section('contents')

<!-- Basic with Icons -->
<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4">EDIT DATA SISWA</h4>
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Edit Data UID Siswa PKL</h5>
                    </div>
                    <div class="card-body">
                    <form method="POST" action="{{ route('siswa.update', $students->id) }}">
                      @csrf
                      @method('PUT')
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="name">Nama</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-fullname2" class="input-group-text">
                              <i class="bx bx-user"></i></span>
                              <input
                                type="text"
                                class="form-control"
                                id="name"
                                name="name"
                                value="{{ $students->name }}" 
                                aria-label="Nama"
                                aria-describedby="basic-icon-default-fullname2"/>
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="uid">UID</label>
                        <div class="col-sm-10">
                        <select id="uid" name="uid" class="form-select">
                        @foreach($uids as $uid)
                        <option value="{{ $uid->uid }}" {{ $students->uid == $uid->uid ? 'selected' : '' }}>
                    {{ $uid->uid }}
                </option>
                @endforeach
                        </select>
                      </div>
                       </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Ubah</button>
                            <button type="cancel" class="btn btn-secondary">Close</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->


@endsection
</body>
</html>