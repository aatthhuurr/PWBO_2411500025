<?php
class Mahasiswa extends Controller {
    public function index()
    {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs']   = $this->model('Mahasiswa_model')-> getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data); // artinya akan memanggil file yang ada didalam folder views lalu ke folder home dan nama filenya bernama index.php
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')-> getMahasiswaById($id);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data); // artinya akan memanggil file yang ada didalam folder views lalu ke folder home dan nama filenya bernama index.php
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0){
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: '.BASEURL.'/mahasiswa');
            exit;
        }else{
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: '.BASEURL.'/mahasiswa');
            exit;
        }
    }
    public function ubah() {
    if($this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST) > 0) {
        Flasher::setFlash('berhasil', 'diubah', 'success');
        header('Location: ' . BASEURL . '/mahasiswa');
        exit;
    } else {
        Flasher::setFlash('gagal', 'diubah', 'danger');
        header('Location: ' . BASEURL . '/mahasiswa');
        exit;
    }
}
    public function hapus($id)
    {
         if($this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0){
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: '.BASEURL.'/mahasiswa');
            exit;
        }else{
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: '.BASEURL.'/mahasiswa');
            exit;
        }
    }

    public function getUbah() {
    $id = $_POST['id'];
    $mahasiswa = $this->model('Mahasiswa_model')->getMahasiswaById($id);
    echo json_encode($mahasiswa);
}


}