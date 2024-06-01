@extends('Layout')
@section('Content')

<a href="#" onclick="ModalTambahJaga()"  class="btn btn-dark"> + Add New Data</a>


<table class="table table-striped table-hover">
    <tr>
        <th>Kode Dokter</th>
        <th>Hari</th>
        <th>Jam Mulai</th>
        <th>Jam Selesai</th>
        <th></th>
    </tr>
    @foreach($tb_jaga as $Get)
    <tr>
        <td>{{ $Get->Kd_dokter}}</td>
        <td>{{ $Get->hari}}</td>
        <td>{{ $Get->Jam_mulai }}</td>
        <td>{{ $Get->Jam_selesai }}</td>
        <td>
        <a href="#" onclick="ModalEditJaga( '{{ $Get->Kd_dokter }}', '{{ $Get->hari}}', ' {{ $Get->Jam_mulai}}', ' {{ $Get->Jam_selesai }}',)" class="btn btn-outline-success">Update</a>
            -
            <a href="#" onclick="ModalHapusJaga( '{{ $Get->Kd_dokter }}' )" class="btn btn-outline-danger">Delete</a>
        </td>
    </tr>
    @endforeach
</table>

<!-- Form Modal Tambah Jaga -->
<form action="jaga/tambah" method="post">
    @csrf
<div class="modal fade" id="ModalTambahJaga" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Form Tambah</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <div class="mb-3">
                <label  class="form-label">Kode Dokter</label>
                <input type="text" class="form-control" name="Kd_dokter" required>
            </div>
            <div class="mb-3">
                <label  class="form-label">Hari</label>
                <textarea name="hari" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label  class="form-label">Jam Mulai</label>
                <textarea name="Jam_mulai" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label  class="form-label">Jam Selesai</label>
                <textarea name="Jam_selesai" class="form-control" required></textarea>
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
<!-- Form Modal Tambah Jaga -->

<!-- Form Modal Hapus Jaga-->
<form action="jaga/hapus" method="post">
    @csrf
<div class="modal fade" id="ModalHapusJaga" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Hapus</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
          <div class="modal-footer">
              <input type="hidden" name="Kd_dokter">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
              <input type="submit" class="btn btn-outline-primary" name="simpan" value="Hapus">
          </div>
      </div>
    </div>
  </div>
</form>
  <!-- Form Modal Hapus Jaga-->
  <!-- Form Modal Edit Dokter -->
  <form action="jaga/edit" method="post">
    @csrf
<div class="modal fade" id="ModalEditJaga" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" >Form Ubah</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <div class="mb-3">
                <label  class="form-label">Kode Dokter</label>
                <input type="text" class="form-control" name="Kd_dokter" required>
            </div>
            <div class="mb-3">
                <label  class="form-label">Hari</label>
                <input type="text" class="form-control" name="hari" required>
            </div>
            <div class="mb-3">
                <label  class="form-label">Jam Mulai</label>
                <textarea name="Jam_mulai" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label  class="form-label">Jam Selesai</label>
                <textarea name="Jam_selesai" class="form-control" required></textarea>
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
     function ModalTambahJaga () {
           $('#ModalTambahJaga').modal('show');
       }
     function ModalHapusJaga ($id) {
            $('[name="Kd_dokter"]').val($id);
           $('#ModalHapusJaga').modal('show');
       }
       function ModalEditJaga (id,hari,mul,sel) {
    
    $('[name="Kd_dokter"]').val(id);
    $('[name="hari"]').val(hari);
    $('[name="Jam_mulai"]').val(mul);
    $('[name="Jam_selesai"]').val(sel);
   $('#ModalEditJaga').modal('show');
}
</script>

@endsection