<!-- Edit Modal -->
  <div class="modal fade" id="editModal{{ $student->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Edit UID Siswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('siswa.update', $student->id) }}" method="POST">
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
                    @if ($student->Uid)
                        <option value="{{ $student->Uid->uid }}">{{ $student->Uid->uid }}</option>
                    @else
                        <option value="">Pilih UID</option>
                        @foreach($uids as $data){
                            <option value="{{$data->uid}}">{{$data->uid}}</option>
                        }
                        @endforeach
                    @endif
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