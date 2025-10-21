<?php

class Home extends Controller {
    public function index()
    {
        $data['judul'] = 'Home';
        $data['nama'] = $this->model('User_model')->getUser();
        $this->view('templates/header', $data);
        $this->view('home/index', $data); // artinya akan memanggil file yang ada didalam folder views lalu ke folder home dan nama filenya bernama index.php
        $this->view('templates/footer');
    }
}