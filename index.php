<!DOCTYPE html>
<html>
<head>
	<title>Membuat CRUD</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="judul">
		<h1>Membuat CRUD PHP & MySQL</h1>
		<h2>Menampilkan Data dari Database</h2>
	</div>
	<br>

	<?php 
		if (isset($_GET['pesan'])) {
			$pesan = $_GET['pesan'];
			if ($pesan == "input") {
				echo "Data berhasil di input";
			}
			else if ($pesan == "update") {
				echo "Data berhasil di update";
			}
			else if ($pesan == "hapus") {
				echo "Data berhasil di hapus";
			}
		}
	 ?>
	 <br>

	 <a class="tombol" href="input.php">+ Tambah Data Baru</a>

	 <h3>Data User</h3>
	 <table border="1" class="table">
	 	<tr>
	 		<th>No</th>
	 		<th>Nama</th>
	 		<th>Alamat</th>
	 		<th>Pekerjaan</th>
	 		<th>Opsi</th>
	 	</tr>
	 	<?php 
	 		// fungsi include untuk menghubungkan file index.php dgn file koneksi.php
	 		include 'koneksi.php';
	 		$query_mysql = mysql_query("SELECT * FROM user")or die(mysql_error());
	 		$nomor = 1;

	 		// menampilkan data variabel query_mysql
	 		while ($data = mysql_fetch_array($query_mysql)) {
	 	 ?>

	 	 <tr>
	 	 	<td><?php echo $nomor++; ?></td>
	 	 	<td><?php echo $data['nama']; ?></td>
	 	 	<td><?php echo $data['alamat']; ?></td>
	 	 	<td><?php echo $data['pekerjaan']; ?></td>
	 	 	<td>
	 	 		<a class="edit" href="edit.php?id=<?php echo $data['id']; ?>">Edit</a> |
	 	 		<a class="hapus" href="hapus.php?id=<?php echo $data['id']; ?>">Hapus</a>
	 	 	</td>
	 	 </tr>
	 	<?php } ?>
	 </table>
</body>
</html>