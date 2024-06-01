@extends('Layout')
@section('Content')

<a href="#" onclick="ModalTambahDokter()"  class="btn btn-dark"> + Add New Data</a>



<table class="table table-striped table-hover">
    <tr>
        <th>Kode Dokter</th>
        <th>Nama Dokter</th>
        <th>Kode Spesialis</th>
        <th>Telepon</th>
        <th>Sex</th>
        <th></th>
    </tr>
    @foreach($tb_dokter as $Get)
    <tr>
        <td>{{ $Get->Kd_dokter}}</td>
        <td>{{ $Get->Nama_dokter}}</td>
        <td>{{ $Get->Kd_spesialis }}</td>
        <td>{{ $Get->telepon }}</td>
        <td>{{ $Get->sex }}</td>
        <td>
            <a href="#" onclick="ModalEditDokter( '{{ $Get->Kd_dokter }}', '{{ $Get->Nama_dokter }}', ' {{ $Get->Kd_spesialis }}', ' {{ $Get->telepon }}', ' {{ $Get->sex }}', )" class="btn btn-outline-success">Update</a>
            -
            <a href="#" onclick="ModalHapusDokter( '{{ $Get->Kd_dokter }}' )" class="btn btn-outline-danger">Delete</a>
        </td>
    </tr>
    @endforeach
</table>

<!-- Form Modal Tambah Dokter -->
<form action="dokter/tambah" method="post">
    @csrf
<div class="modal fade" id="ModalTambahDokter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <label  class="form-label">Nama Dokter</label>
                <textarea name="Nama_dokter" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label  class="form-label">Kode Spesialis</label>
                <textarea name="Kd_spesialis" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label  class="form-label">No Telepon</label>
                <textarea name="telepon" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label  class="form-label">Sex</label>
                <textarea name="sex" class="form-control" required></textarea>
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
<!-- Form Modal Tambah Dokter -->

<!-- Form Modal Hapus Dokter-->
<form action="dokter/hapus" method="post">
    @csrf
<div class="modal fade" id="ModalHapusDokter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
  <!-- Form Modal Hapus Dokter-->

  <!-- Form Modal Edit Dokter -->
<form action="dokter/edit" method="post">
    @csrf
<div class="modal fade" id="ModalEditDokter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <label  class="form-label">Nama Berita</label>
                <input type="text" class="form-control" name="Nama_dokter" required>
            </div>
            <div class="mb-3">
                <label  class="form-label">Kode Spesialis</label>
                <textarea name="Kd_spesialis" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label  class="form-label">No Telepon</label>
                <textarea name="telepon" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label  class="form-label">Sex</label>
                <textarea name="sex" class="form-control" required></textarea>
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
    // Modal Tambah Dokter
    function ModalTambahDokter () {
           $('#ModalTambahDokter').modal('show');
       }
    // Modal Hapus Berita
     function ModalHapusDokter ($id) {
            $('[name="Kd_dokter"]').val($id);
           $('#ModalHapusDokter').modal('show');
       }
       // Modal Edit Berita
    function ModalEditDokter (id,nama,kode,no,sex) {
    
    $('[name="Kd_dokter"]').val(id);
    $('[name="Nama_dokter"]').val(nama);
    $('[name="Kd_spesialis"]').val(kode);
    $('[name="telepon"]').val(no);
    $('[name="sex"]').val(sex);
   $('#ModalEditDokter').modal('show');
}

</script>

@endsection