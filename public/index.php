<?php
if(!session_id()){ session_start(); }

require_once '../app/init.php'; //file init ini yang akan memanggil semua file yang kita butuhkan, teknik ini dinamakan bootstraping ( panggil satu file, dan file tsb akan memanggil seluruh aplikasi MVC)

$app = new App; //memanggil class App