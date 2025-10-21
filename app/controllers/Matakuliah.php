<?php
class Matakuliah extends Controller {
    public function index()
    {
        $data['judul'] = 'Daftar Matakuliah';
        $data['matkul']   = $this->model('Matakuliah_model')->getAllMatakuliah();
        $this->view('templates/header', $data);
        $this->view('matakuliah/index', $data); // artinya akan memanggil file yang ada didalam folder views lalu ke folder home dan nama filenya bernama index.php
        $this->view('templates/footer');
    }   

    public function detail($id)
    {
        $data['judul'] = 'Detail Matakuliah';
        $data['matkul'] = $this->model('Matakuliah_model')->getMatakuliahById($id);
        $this->view('templates/header', $data);
        $this->view('matakuliah/detail', $data); // memanggil file views/matakuliah/detail.php
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if($this->model('Matakuliah_model')->tambahDataMatakuliah($_POST) > 0){
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: '.BASEURL.'/matakuliah');
            exit;
        }else{
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: '.BASEURL.'/matakuliah');
            exit;
        }
    }
    public function ubah() {
    if($this->model('Matakuliah_model')->ubahDataMatakuliah($_POST) > 0) {
        Flasher::setFlash('berhasil', 'diubah', 'success');
        header('Location: ' . BASEURL . '/matakuliah');
        exit;
    } else {
        Flasher::setFlash('gagal', 'diubah', 'danger');
        header('Location: ' . BASEURL . '/matakuliah');
        exit;
    }
}
    public function hapus($id)
    {
         if($this->model('Matakuliah_model')->hapusDataMatakuliah($id) > 0){
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: '.BASEURL.'/matakuliah');
            exit;
        }else{
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: '.BASEURL.'/matakuliah');
            exit;
        }
    }

    public function getUbah() {
    $id = $_POST['id'];
    $Matakuliah = $this->model('Matakuliah_model')->getMatakuliahById($id);
    echo json_encode($Matakuliah);
}


}