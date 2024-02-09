<!-- Edit Modal -->
  <div class="modal fade" id="editModal{{ $student->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="{{ route('siswa.update', $student->id) }}">
        @csrf
        @method('PUT')
        <div class="modal-body">
            <div class="row">
                <div class="col mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" id="name" class="form-control" value="{{ $student->name }}" disabled>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="uid" class="form-label">UID</label>
                    <select name="uid" id="uid" class="form-select">
                        <option value="">Pilih UID</option>
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