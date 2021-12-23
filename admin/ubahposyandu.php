<h2>Ubah Data Posyandu</h2>
<hr>

<?php
$id = $_GET["id"];
$data = query("SELECT * FROM data_posyandu WHERE id_posyandu = $id")[0];
?>

<form method="post" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?= $data["id_posyandu"]; ?>">
	<div class="form-group">
		<label>Nama Posyandu</label>
		<input type="text" class="form-control" name="nama" 
				value="<?= $data["nama_posyandu"]; ?>">
	</div>
	<div class="form-group">
		<label>RT</label>
		<input type="text" class="form-control" name="rt"
				value="<?= $data["rt"]; ?>">
	</div>
	<div class="form-group">
		<label>RW</label>
		<input type="text" class="form-control" name="rw"
				value="<?= $data["rw"]; ?>">
	</div>
	<div class="form-group">
		<label>Desa</label>
		<input type="text" class="form-control" name="desa"
				value="<?= $data["desa"]; ?>">
	</div>
	<div class="form-group">
		<label>Kecamatan</label>
		<input type="text" class="form-control" name="kecamatan"
				value="<?= $data["kecamatan"]; ?>">
	</div>
	<div class="form-group">
		<label>Kabupaten</label>
		<input type="text" class="form-control" name="kabupaten"
				value="<?= $data["kabupaten"]; ?>">
	</div>
	<div class="form-group">
		<label>Provinsi</label>
		<input type="text" class="form-control" name="provinsi"
				value="<?= $data["provinsi"]; ?>">
	</div>
	
	<button class="btn btn-primary" type="submit" name="submit">Ubah</button>
</form>
<br>

<?php 
if (isset($_POST["submit"]) ){

	//cek apakah data berhasil diubah atau tidak
	if (ubahposyandu($_POST) > 0){
		echo "<div class='alert alert-info'> Data Berhasil Diubah </div>";
		echo "
			<script>
				document.location.href = 'index.php?halaman=posyandu';
			</script>
		";
	} else{
		echo "<script>
				alert('data gagal diubah');
				document.location.href = 'index.php?halaman=posyandu';
			</script>";
	}

}

?>