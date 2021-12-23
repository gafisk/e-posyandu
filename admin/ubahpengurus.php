<h2>Ubah Data Pengurus</h2>
<hr>

<?php
$id = $_GET["id"];
$data = query("SELECT * FROM pengurus WHERE id_pengurus = $id")[0];
?>

<form method="post" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?= $data["id_pengurus"]; ?>">
	<div class="form-group">
		<select name="nama" id="nama" class="form-control">
				<?php $ambil = query("SELECT * FROM data_posyandu"); ?>
				<?php foreach($ambil as $row): ?>
			<option value="<?=$row['id_posyandu']?>"><?=$row['nama_posyandu']?></option> 
				<?php endforeach; ?>
		</select>
	</div>
	<div class="form-group">
		<label>NIK Pengurus</label>
		<input type="text" class="form-control" name="nik"
				value="<?= $data['nik_pengurus']; ?>">
	</div>
	<div class="form-group">
		<label>Username Pengurus</label>
		<input type="text" class="form-control" name="username"
				value="<?= $data['username_pengurus']; ?>">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="text" class="form-control" name="password"
				value="<?= $data["password_pengurus"]; ?>">
	</div>
	
	
	<button class="btn btn-primary" type="submit" name="submit">Ubah</button>
</form>
<br>

<?php 
if (isset($_POST["submit"]) ){

	//cek apakah data berhasil diubah atau tidak
	if (ubahpengurus($_POST) > 0){
		echo "<div class='alert alert-info'> Data Berhasil Diubah </div>";
		echo "
			<script>
				document.location.href = 'index.php?halaman=pengurus';
			</script>
		";
	} else{
		echo "<script>
				alert('data gagal diubah');
				document.location.href = 'index.php?halaman=pengurus';
			</script>";
	}

}

?>