<div class="container mt-5">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
         <h5 class="card-title"><?php echo $data['matkul'] ['nama_mk']; ?></h5>
         <h6 class="card-subtitle mb-2 text-muted"><?php echo $data['matkul'] ['kode_mk']; ?></h6>
         <p class="card-text"><?php echo $data['matkul'] ['jns_mk']; ?></p>
         <p class="card-text"><?php echo $data['matkul'] ['sks']; ?></p>
         <a href="<?php echo BASEURL;?>/matakuliah" class="card-link">Kembali</a>
    </div>
  </div>
</div>