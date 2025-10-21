<?php require_once '../app/views/templates/header.php'; ?>
<div class="container mt-4">
  <div class="row">
    <div class="col-lg-6">
      <?php Flasher::flash(); ?>

      <!-- Tombol Tambah Data -->
      <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
        Tambah Data Mahasiswa
      </button>

      <br><br>

      <h3>Daftar Mahasiswa</h3>

      <ul class="list-group">
        <?php foreach($data['mhs'] as $mhs) : ?>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <div><?= $mhs['nama']; ?></div>
            <div>
              <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>" class="badge badge-pill badge-primary ml-1">detail</a>

              <!-- Tombol Ubah -->
              <a href="#" class="badge badge-pill badge-success tampilModalUbah" 
                 data-toggle="modal" 
                 data-target="#formModal" 
                 data-id="<?= $mhs['id']; ?>">
                 ubah
              </a>

              <a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id']; ?>" 
                 class="badge badge-pill badge-danger ml-1" 
                 onclick="return confirm('Yakin?');">
                 hapus
              </a>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!-- Form -->
       <!-- Tambahkan data ke tabel-->
      <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
        <div class="modal-body">
          <!-- Hidden ID untuk ubah -->
          <input type="hidden" name="id" id="id">

          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
          </div>
          <div class="form-group">
            <label for="nim">NIM</label>
            <input type="text" class="form-control" id="nim" name="nim" required>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="form-group">
            <label for="jurusan">Jurusan</label>
            <select class="form-control" id="jurusan" name="jurusan" required>
              <option value="Teknik Informatika">Teknik Informatika</option>
              <option value="Sistem Informasi">Sistem Informasi</option>
              <option value="Bisnis Digital">Bisnis Digital</option>
            </select>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah Data</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- ================== SCRIPT ================== -->

<!-- jQuery (FULL version, bukan slim) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap -->
<script src="<?= BASEURL; ?>/js/bootstrap.bundle.min.js"></script>

<!-- Script custom -->
<script>
$(function() {
  $('.tombolTambahData').on('click', function() {
      $('#exampleModalLabel').html('Tambah Data Mahasiswa');
      $('.modal-footer button[type=submit]').html('Tambah Data');
      $('form').attr("action", "<?= BASEURL; ?>/mahasiswa/tambah");
      $('#id').val('');
      $('#nama').val('');
      $('#nim').val('');
      $('#email').val('');
      $('#jurusan').val('');
  });

  $('.tampilModalUbah').on('click', function() {
      $('#exampleModalLabel').html('Ubah Data Mahasiswa');
      $('.modal-footer button[type=submit]').html('Ubah Data');
      $('form').attr("action", "<?= BASEURL; ?>/mahasiswa/ubah");

      const id = $(this).data('id');

      $.ajax({
          url: "<?= BASEURL; ?>/mahasiswa/getUbah",
          data: { id: id },
          method: 'post',
          dataType: 'json',
          success: function(data) {
              $('#id').val(data.id);
              $('#nama').val(data.nama);
              $('#nim').val(data.nim);
              $('#email').val(data.email);
              $('#jurusan').val(data.jurusan);
          }
      });
  });
});
</script>

<?php require_once '../app/views/templates/footer.php'; ?>



