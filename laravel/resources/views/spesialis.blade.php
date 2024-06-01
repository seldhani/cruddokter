@extends('Layout')
@section('Content')

<a href="#" onclick="ModalTambahSpesialis()" class="btn btn-dark"> + Add New Data</a>

<table class="table table-striped table-hover">
    <tr>
        <th>Kode Spesialis</th>
        <th>Spesialis</th>
        <th></th>
    </tr>
    @foreach($tb_spesialis as $Get)
    <tr>
        <td>{{ $Get->Kd_spesialis }}</td>
        <td>{{ $Get->spesialis }}</td>
        <td>
            <a href="#" onclick="ModalEditSpesialis('{{ $Get->Kd_spesialis }}', '{{ $Get->spesialis }}')" class="btn btn-outline-success">Update</a>
            -
            <a href="#" onclick="ModalHapusSpesialis('{{ $Get->Kd_spesialis }}')" class="btn btn-outline-danger">Delete</a>
        </td>
    </tr>
    @endforeach
</table>

<!-- Form Modal Tambah Spesialis -->
<form action="{{ url('spesialis/tambah') }}" method="post">
    @csrf
    <div class="modal fade" id="ModalTambahSpesialis" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Tambah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Kode Spesialis</label>
                        <input type="text" class="form-control" name="Kd_spesialis" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Spesialis</label>
                        <textarea name="spesialis" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                    <input type="submit" class="btn btn-outline-primary" name="simpan" value="Simpan">
                </div>
            </div>
        </div>
    </div>
</form>


<!-- Form Modal Hapus Dokter -->
<form action="spesialis/hapus" method="post">
    @csrf
    <div class="modal fade" id="ModalHapusSpesialis" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
                <div class="modal-footer">
                    <input type="hidden" id="hapusKdSpesialis" name="Kd_spesialis">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                    <input type="submit" class="btn btn-outline-primary" name="simpan" value="Hapus">
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Form Modal Edit Spesialis -->
<form action="spesialis/edit" method="post">
    @csrf
    <div class="modal fade" id="ModalEditSpesialis" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Ubah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Kode Spesialis</label>
                        <input type="text" class="form-control" id="editKdSpesialis" name="Kd_spesialis" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Spesialis</label>
                        <input type="text" class="form-control" id="editSpesialis" name="spesialis" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                    <input type="submit" class="btn btn-outline-primary" name="ubah" value="Edit">
                </div>
            </div>
        </div>
    </div>
</form>

<script>
        function ModalTambahSpesialis() {
        $('#ModalTambahSpesialis').modal('show');
    }

    function ModalHapusSpesialis(id) {
        $('#hapusKdSpesialis').val(id);
        $('#ModalHapusSpesialis').modal('show');
    }

    function ModalEditSpesialis(id, spes) {
        $('#editKdSpesialis').val(id);
        $('#editSpesialis').val(spes);
        $('#ModalEditSpesialis').modal('show');
    }
</script>

@endsection
