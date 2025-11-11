<div class="container mt-5">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
         <h5 class="card-title"><?php echo $data['pinjam'] ['Kd_pinjam025']; ?></h5>
         <h6 class="card-subtitle mb-2 text-muted"><?php echo $data['pinjam'] ['NimMhs025']; ?></h6>
         <p class="card-text"><?php echo $data['pinjam'] ['TglPinjam025']; ?></p>
         <p class="card-text"><?php echo $data['pinjam'] ['JmlPinjam025']; ?></p>
         <p class="card-text"><?php echo $data['pinjam'] ['JudulBuku025']; ?></p>
         <p class="card-text"><?php echo $data['pinjam'] ['TglKembali025']; ?></p>
         <a href="<?php echo BASEURL;?>/Pinjam" class="card-link">Kembali</a>
    </div>
  </div>
</div>