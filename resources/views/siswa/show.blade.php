  <!-- Modal detail siswa -->
  <div class="modal fade" id="detailModal{{ $student->id }}" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                <h4>BIODATA SISWA</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <!-- Tampilkan foto, alamat, jurusan, sekolah, dll -->
                  <img style="width: 315px; height: 450px;" src="{{ 'https://siswa.cvconnectis.com/images/'.$student->img }}" alt="Foto Siswa" class="img-fluid"/>
                  <div class="col md-8">
                      <div class="col mb-3">
                        <label for="nameBasic" class="form-label">Name :</label>
                        <input type="text" id="nameBasic" class="form-control" value="{{ $student->name }}" disabled> 
                      </div>
                    @if ($student->Uid)
                      <div class="col mb-3">
                        <label for="nameBasic" class="form-label">UID :</label>
                        <input type="text" id="nameBasic" class="form-control" value="{{ $student->Uid->uid }}" disabled> 
                      </div>
                    @else
                      <div class="col mb-3">
                        <label for="nameBasic" class="form-label">UID :</label>
                        <input type="text" id="nameBasic" class="form-control" value="Tidak Ada" disabled> 
                      </div>
                    @endif
                      <div class="col mb-3">
                        <label for="nameBasic" class="form-label">Alamat :</label>
                        <input type="text" id="nameBasic" class="form-control" value="{{ $student->address }}" disabled> 
                      </div>
                      <div class="col mb-3">
                        <label for="nameBasic" class="form-label">Jurusan :</label>
                        <input type="text" id="nameBasic" class="form-control" value="{{ $student->majors->name }}" disabled> 
                      </div>
                      <div class="col mb-3">
                        <label for="nameBasic" class="form-label">Sekolah :</label>
                        <input type="text" id="nameBasic" class="form-control" value="{{ $student->school->name }}" disabled> 
                      </div>
                  </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>