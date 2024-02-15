<!-- Modal -->
<div class="modal fade" id="editModal{{ $absensi->id }}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Edit Keterangan - {{ $absensi->students->name }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('absensi.update', $absensi->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <label for="keterangan" class="form-label">keterangan :</label>
              <select name="keterangan" class="form-select" id="keterangan">
              @if($absensi->keterangan == 'Alfa' || $absensi->keterangan == 'Terlambat')
                  <option value="Sakit" {{ $absensi->keterangan == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                  <option value="Ijin" {{ $absensi->keterangan == 'Ijin' ? 'selected' : '' }}>Ijin</option>
                  <option value="Teknisi" {{ $absensi->keterangan == 'Teknisi' ? 'selected' : '' }}>Teknisi</option>
              @endif
                <option value="Hadir" {{ $absensi->keterangan == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                <option value="Terlambat" {{ $absensi->keterangan == 'Terlambat' ? 'selected' : '' }}>Terlambat</option>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Ubah</button>
        </div>
      </form>
    </div>
  </div>
</div>