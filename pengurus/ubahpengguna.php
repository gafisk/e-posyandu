<h2>Ubah Data Pengguna</h2>
<hr>

<?php
$id = $_GET["id"];
$data = query("SELECT * FROM pengguna WHERE id_pengguna = $id")[0];
?>

<form method="post" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?= $data["id_pengguna"]; ?>">
	<div class="form-group">
		<label>Username</label>
		<input type="text" class="form-control" name="username" 
				value="<?= $data["username_pengguna"]; ?>">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="text" class="form-control" name="password"
				value="<?= $data["password_pengguna"]; ?>">
	</div>
	<div class="form-group">
		<label>NIK Balita</label>
		<input type="number" name="nik_balita" class="form-control"
				value="<?= $data["nik_balita"] ?>"> 
	</div>
	
	<button class="btn btn-primary" type="submit" name="submit">Ubah</button>
</form>

<?php 
if (isset($_POST["submit"]) ){

	//cek apakah data berhasil diubah atau tidak
	if (ubahpengguna($_POST) > 0){
		echo "<div class='alert alert-info'> Data Berhasil Diubah </div>";
		echo "
			<script>
				document.location.href = 'index.php?halaman=datapengguna';
			</script>
		";
	} else{
		echo "<script>
				alert('data gagal diubah');
				document.location.href = 'index.php?halaman=datapengguna';
			</script>";
	}

}

?>