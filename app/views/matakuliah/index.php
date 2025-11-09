<?php require_once '../app/views/templates/header.php'; ?>

<div class="container mt-4">
  <?php Flasher::flash(); ?>

  <!-- Tombol Tambah -->
  <button type="button" class="btn btn-primary tombolTambahData mb-3" data-toggle="modal" data-target="#formModal">
    Tambah Data Matakuliah
  </button>

  <h3>Daftar Matakuliah</h3>

  <div class="list-group mt-3">
  <?php foreach ($data['matkul'] as $mk): ?>
    <div class="list-group-item d-flex justify-content-between align-items-center">
      <div>
        <h5 class="mb-1"><?= $mk['nama_mk']; ?></h5>
        <small class="text-muted">
          Kode: <?= $mk['kode_mk']; ?> |
          Jenis: <?= $mk['jns_mk']; ?> |
          SKS: <?= $mk['sks']; ?>
        </small>
      </div>
      <div>
        <a href="<?= BASEURL; ?>/Matakuliah/detail/<?= $mk['id']; ?>" class="badge badge-pill badge-primary ml-1">detail</a>
        <a href="#" class="badge badge-pill badge-success tampilModalUbah" data-toggle="modal" data-target="#formModal" data-id="<?= $mk['id']; ?>">ubah</a>
        <a href="<?= BASEURL; ?>/Matakuliah/hapus/<?= $mk['id']; ?>" class="badge badge-pill badge-danger ml-1" onclick="return confirm('Yakin ingin menghapus data ini?');">hapus</a>
      </div>
    </div>
  <?php endforeach; ?>
</div>
</div>

<!-- Modal Form -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Matakuliah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="<?= BASEURL; ?>/Matakuliah/tambah" method="post">
        <div class="modal-body">
          <input type="hidden" name="id" id="id">

          <div class="form-group">
            <label for="kode_mk">Kode MK</label>
            <input type="text" class="form-control" id="kode_mk" name="kode_mk" required>
          </div>
          <div class="form-group">
            <label for="nama_mk">Nama Matakuliah</label>
            <input type="text" class="form-control" id="nama_mk" name="nama_mk" required>
          </div>
          <div class="form-group">
            <label for="jns_mk">Jenis Matakuliah</label>
            <select class="form-control" id="jns_mk" name="jns_mk" required>
              <option value="Teori">Teori</option>
              <option value="Praktikum">Praktek</option>
            </select>
          </div>
          <div class="form-group">
            <label for="sks">Jumlah SKS</label>
            <input type="number" class="form-control" id="sks" name="sks" required min="1" max="6">
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Tambah Data</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Script Modal -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?= BASEURL; ?>/js/bootstrap.bundle.min.js"></script>
<script>
$(function() {
  // Tombol Tambah
  $('.tombolTambahData').on('click', function() {
    $('#exampleModalLabel').html('Tambah Data Matakuliah');
    $('.modal-footer button[type=submit]').html('Tambah Data').show();
    $('form').attr('action', '<?= BASEURL; ?>/Matakuliah/tambah');
    $('#id').val('');
    $('#kode_mk').val('');
    $('#nama_mk').val('');
    $('#jns_mk').val('');
    $('#sks').val('');
    $('#kode_mk, #nama_mk, #jns_mk, #sks').prop('readonly', false).prop('disabled', false);
  });

  // Tombol Ubah
  $(document).on('click', '.tampilModalUbah', function() {
    $('#exampleModalLabel').html('Ubah Data Matakuliah');
    $('.modal-footer button[type=submit]').html('Ubah Data').show();
    $('form').attr('action', '<?= BASEURL; ?>/Matakuliah/ubah');

    const id = $(this).data('id');

    $.ajax({
      url: '<?= BASEURL; ?>/Matakuliah/getUbah',
      data: { id: id },
      method: 'post',
      dataType: 'json',
      success: function(data) {
        $('#id').val(data.id);
        $('#kode_mk').val(data.kode_mk);
        $('#nama_mk').val(data.nama_mk);
        $('#jns_mk').val(data.jns_mk);
        $('#sks').val(data.sks);
        $('#kode_mk, #nama_mk, #jns_mk, #sks').prop('readonly', false).prop('disabled', false);
      }
    });
  });

  // Reset modal saat ditutup
  $('#formModal').on('hidden.bs.modal', function () {
    $('#exampleModalLabel').html('Tambah Data Matakuliah');
    $('.modal-footer button[type=submit]').html('Tambah Data').show();
    $('form').attr('action', '<?= BASEURL; ?>/Matakuliah/tambah');
    $('#kode_mk, #nama_mk, #jns_mk, #sks').prop('readonly', false).prop('disabled', false);
    $('form')[0].reset();
  });
});

  $('.tombolTambahData').on('click', function() {
    $('#exampleModalLabel').html('Tambah Data Matakuliah');
    $('.modal-footer button[type=submit]').html('Tambah Data');
    $('form').attr('action', '<?= BASEURL; ?>/Matakuliah/tambah');
    $('#id').val('');
    $('#kode_mk').val('');
    $('#nama_mk').val('');
    $('#jns_mk').val('');
    $('#sks').val('');
  });

  $('.tampilModalUbah').on('click', function() {
    $('#exampleModalLabel').html('Tampil Data Matakuliah');
    $('.modal-footer button[type=submit]').hide(); // sembunyikan tombol submit
    $('form').attr('action', ''); // nonaktifkan action form

    const id = $(this).data('id');
    $.ajax({
      url: '<?= BASEURL; ?>/Matakuliah/getUbah',
      data: { id: id },
      method: 'post',
      dataType: 'json',
      success: function(data) {
        $('#id').val(data.id);
        $('#kode_mk').val(data.kode_mk).prop('readonly', true);
        $('#nama_mk').val(data.nama_mk).prop('readonly', true);
        $('#jns_mk').val(data.jns_mk).prop('disabled', true);
        $('#sks').val(data.sks).prop('readonly', true);
      }
    });
  });

  // Reset form saat modal ditutup
  $('#formModal').on('hidden.bs.modal', function () {
    $('#exampleModalLabel').html('Tambah Data Matakuliah');
    $('.modal-footer button[type=submit]').show();
    $('form').attr('action', '<?= BASEURL; ?>/Matakuliah/tambah');
    $('#kode_mk, #nama_mk, #jns_mk, #sks').prop('readonly', false).prop('disabled', false);
    $('form')[0].reset();
  });
</script>

<?php require_once '../app/views/templates/footer.php'; ?>
