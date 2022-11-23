<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pakek bootstrap Kok</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body class="d-flex flex-column h-100">
	<header>
		<!-- navbar -->
		<nav class="navbar navbar-expand-lg bg-warning navbar-light">
			<div class="container-fluid">
				<strong><a class="navbar-brand" href="<?php echo base_url() ?>">UJIAN VALIDASION</a></strong>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
					data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
					aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
					<div class="navbar-nav ms-auto">

					<!-- ini link tabel perKapkl-an  -->
					<a class="nav-link" href="<?php echo base_url('c_dosen');?>">Dosen</a>
					<a class="nav-link" href="<?php echo base_url('c_prodi');?>">Program Studi</a>
					<a class="nav-link" href="<?php echo base_url('c_mahasiswa');?>">Mahasiswa</a>
					<a class="nav-link" href="<?php echo base_url('c_tempat');?>">Tempat PKL</a>
					<a class="nav-link" href="<?php echo base_url('c_pkl');?>">PKL</a>

					</div>
				</div>
			</div>
		</nav>
		<!-- akhir navbar -->
	</header>

	<main class="flex-shrink-0">
