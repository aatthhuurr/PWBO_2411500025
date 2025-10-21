<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Mahasiswa</title>

  <!-- Bootstrap CSS -->
  <link 
    rel="stylesheet" 
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
  >

  <style>
    .navbar a,
    .navbar .nav-link,
    .navbar .navbar-brand {
      color: black !important;
      text-decoration: none;
    }

    .navbar a:hover,
    .navbar .nav-link:hover,
    .navbar .navbar-brand:hover {
      color: gray !important;
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="<?php echo BASEURL; ?>">PWBO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo BASEURL; ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASEURL; ?>/mahasiswa">Mahasiswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASEURL; ?>/matakuliah">Mata Kuliah</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASEURL; ?>/about">About</a>
        </li>
    </div>
  </div>
</nav>