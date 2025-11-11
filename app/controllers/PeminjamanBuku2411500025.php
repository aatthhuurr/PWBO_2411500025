<?php
class PeminjamanBuku2411500025 extends Controller {
    public function index()
    {
        $data['judul'] = 'Daftar Peminjaman';
        $data['pinjam']   = $this->model('PeminjamanBuku2411500025_model')-> getAllPeminjaman();
        $this->view('templates/header', $data);
        $this->view('Pinjam/index', $data); // artinya akan memanggil file yang ada didalam folder views lalu ke folder home dan nama filenya bernama index.php
        $this->view('templates/footer');
    }

    public function detail($kd)
    {
        $data['judul'] = 'Detail Peminjaman Buku';
        $data['pinjam'] = $this->model('PeminjamanBuku2411500025_model')-> getPeminjamanById($kd);
        $this->view('templates/header', $data);
        $this->view('Pinjam/detail', $data); // artinya akan memanggil file yang ada didalam folder views lalu ke folder home dan nama filenya bernama index.php
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if($this->model('PeminjamanBuku2411500025_model')->tambahDataPeminjaman($_POST) > 0){
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: '.BASEURL.'/Pinjam');
            exit;
        }else{
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: '.BASEURL.'/Pinjam');
            exit;
        }
    }
    public function ubah() {
    if($this->model('PeminjamanBuku2411500025_model')->ubahDataPeminjaman($_POST) > 0) {
        Flasher::setFlash('berhasil', 'diubah', 'success');
        header('Location: ' . BASEURL . '/Pinjam');
        exit;
    } else {
        Flasher::setFlash('gagal', 'diubah', 'danger');
        header('Location: ' . BASEURL . '/Pinjam');
        exit;
    }
}
    public function hapus($kd)
    {
         if($this->model('PeminjamanBuku2411500025_model')->hapusDataPeminjaman($kd) > 0){
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: '.BASEURL.'/Pinjam');
            exit;
        }else{
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: '.BASEURL.'/Pinjam');
            exit;
        }
    }

    public function getUbah() {
    $kd = $_POST['kd'];
    $pinjam = $this->model('PeminjamanBuku2411500025_model')->getPeminjamanById($kd);
    echo json_encode($pinjam);
}


}