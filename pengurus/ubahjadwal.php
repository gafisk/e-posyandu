<h2>Ubah Jadwal</h2>
<hr>

<?php
$id = $_GET["id"];
$jadwal = query("SELECT * FROM jadwal WHERE id_jadwal = $id")[0];
?>

<form method="post" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?= $jadwal["id_jadwal"]; ?>">
	<div class="form-group">
		<label>Tanggal</label>
		<input type="date" class="form-control" name="tanggal" 
				value="<?= $jadwal["tanggal"]; ?>">
	</div>
	<div class="form-group">
		<label>Waktu</label>
		<input type="time" class="form-control" name="waktu"
				value="<?= $jadwal["waktu"]; ?>">
	</div>
	<div class="form-group">
		<label>Nama Kegiatan</label>
		<input type="text" class="form-control" name="nama_kegiatan"
				value="<?= $jadwal["nama_kegiatan"]; ?>">
	</div>
	
	<button class="btn btn-primary" type="submit" name="submit">Ubah</button>
</form>

<?php 
if (isset($_POST["submit"]) ){

	//cek apakah data berhasil diubah atau tidak
	if (ubah($_POST) > 0){
		echo "<div class='alert alert-info'> Data Berhasil Diubah </div>";
		echo "
			<script>
				document.location.href = 'index.php?halaman=jadwal';
			</script>
		";
	} else{
		echo "<script>
				alert('data gagal diubah');
				document.location.href = 'index.php?halaman=jadwal';
			</script>";
	}

}

?>