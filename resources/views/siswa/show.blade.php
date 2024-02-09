  <!-- Modal detail siswa -->
  <div class="modal fade" id="detailModal{{ $student->id }}" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-fullscreen" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">{{ $student->name }}</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <!-- Tampilkan foto, alamat, jurusan, sekolah, dll -->
                  <img style="width: 350px; height: 500px;" src="{{ 'https://siswa.cvconnectis.com/images/'.$student->img }}" alt="Foto Siswa" class="img-fluid"/>
                  <div class="col md-8">
                    @if ($student->Uid)
                      <p>UID : {{ $student->Uid->uid }}</p>
                    @else
                      <p>UID: Tidak Ada</p>
                    @endif
                    <p>Alamat   : {{ $student->address }}</p>
                    <p>Jurusan  : {{ $student->majors->name }}</p>
                    <p>Sekolah  : {{ $student->school->name }}</p>
                  </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>