<?php require_once '../app/views/templates/header.php'; ?>
<div class="container mt-4">
  <div class="row">
    <div class="col-lg-6">
      <?php Flasher::flash(); ?>

      <!-- Tombol Tambah Data -->
      <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
        Tambah Data Peminjaman Buku
      </button>

      <br><br>

      <h3>Daftar Peminjaman Buku</h3>

      <ul class="list-group">
        <?php foreach ($data['pinjam'] as $pinjam) : ?>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <div><?= $pinjam['Kd_pinjam025']; ?></div>
            <div>
              <a href="<?= BASEURL; ?>/Pinjam/detail/<?= $pinjam['kd_pinjam025']; ?>" class="badge badge-pill badge-primary ml-1">detail</a>

              <!-- Tombol Ubah -->
              <a href="#" class="badge badge-pill badge-success tampilModalUbah"
                data-toggle="modal"
                data-target="#formModal"
                data-kd="<?= $pinjam['kd_pinjam025']; ?>">
                ubah
              </a>

              <a href="<?= BASEURL; ?>/Pinjam/hapus/<?= $pinjam['Kd_pinjam025']; ?>"
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
<div class="modal fade" kd="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hkdden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" kd="exampleModalLabel">Tambah Data Peminjaman Buku</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hkdden="true">&times;</span>
        </button>
      </div>

      <!-- Form -->
      <!-- Tambahkan data ke tabel-->
      <form action="<?= BASEURL; ?>/Pinjam/tambah" method="post">
        <div class="modal-body">
          <!-- Hkdden kd untuk ubah -->
          <input type="hkdden" name="kd" kd="Kd_pinjam025">

          <div class="form-group">
            <label for="Kd_pinjam025">Kode Pinjam</label>
            <input type="text" class="form-control" kd="Kd_pinjam025" name="Kd_pinjam025" required>
          </div>
          <div class="form-group">
            <label for="NimMhs025">NIM</label>
            <input type="text" class="form-control" kd="nim" name="nim" required>
          </div>
          <div class="form-group">
            <label for="TglPinjam025">Tanggal Pinjam</label>
            <input type="date" class="form-control" kd="TglPinjam025" name="TglPinjam025" required>
          </div>
          <div class="form-group">
            <label for="JmlPinjam025">Jumlah Pinjam</label>
            <input type="text" class="form-control" kd="JmlPinjam025" name="JmlPinjam025" required>
          </div>
          <div class="form-group">
            <label for="JudulBuku025">Judul Buku</label>
            <input type="text" class="form-control" kd="JudulBuku025" name="JudulBuku025" required>
          </div>
          <div class="form-group">
            <label for="TglKembali025">Tanggal Kembali</label>
            <input type="date" class="form-control" kd="TglKembali025" name="TglKembali025" required>
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
      $('#exampleModalLabel').html('Tambah Data Peminjaman');
      $('.modal-footer button[type=submit]').html('Tambah Data');
      $('form').attr("action", "<?= BASEURL; ?>/Pinjam/tambah");
      $('#Kd_pinjam025').val('');
      $('#NimMhs025').val('');
      $('#TglPinjam025').val('');
      $('#JmlPinjam025').val('');
      $('#JudulBuku025').val('');
      $('#TglKembali025').val('');
    });

    $('.tampilModalUbah').on('click', function() {
      $('#exampleModalLabel').html('Ubah Data Peminjaman');
      $('.modal-footer button[type=submit]').html('Ubah Data');
      $('form').attr("action", "<?= BASEURL; ?>/Pinjam/ubah");

      const kd = $(this).data('Kd_pinjam025');

      $.ajax({
        url: "<?= BASEURL; ?>/Pinjam/getUbah",
        data: {
          kd: kd
        },
        method: 'post',
        dataType: 'json',
        success: function(data) {
          $('#Kd_pinjam025').val(data.Kd_pinjam025);
          $('#NimMhs025').val(data.NimMhs025);
          $('#TglPinjam025').val(data.TglPinjam025);
          $('#JmlPinjam025').val(data.JmlPinjam025);
          $('#JudulBuku025').val(data.JudulBuku025);
          $('#TglKembali025').val(data.TglKembali025);
        }
      });
    });
  });
</script>

<?php require_once '../app/views/templates/footer.php'; ?>