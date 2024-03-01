<!-- Edit Modal -->

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="modal fade" id="editModal{{ $student->id }}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Edit UID Siswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('siswa.update', $student->id) }}" method="POST" onsubmit="return confirmUpdateUID()">
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
            <input type="text" name="uid" id="uid" class="form-control" placeholder="Enter UID">
          </div>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
    // Fungsi untuk menampilkan dialog konfirmasi sebelum pengiriman formulir
    function confirmUpdateUID() {
        // Tampilkan dialog konfirmasi dengan pesan yang sesuai
        var confirmation = confirm("UID sudah digunakan oleh siswa lain. Apakah Anda ingin melanjutkan?");
        
        // Kembalikan hasil konfirmasi
        return confirmation;
    }
</script>