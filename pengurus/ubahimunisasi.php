<h2>Ubah Data Imunisasi</h2>
<hr>

<?php 
$id = $_GET['id'];

$data = query("SELECT * FROM data_imunisasi WHERE id_data_imunisasi=$id")[0];
?>

<form method="post" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?= $data["id_data_imunisasi"]; ?>">
	<input type="hidden" name="nik_balita" value="<?= $data["nik_balita"]; ?>">

	<div class="form-group">
		<label>Tanggal</label>
		<input type="date" class="form-control" name="tanggal" 
				value="<?= $data["tanggal_imunisasi"]; ?>">
	</div>

	<div class="form-group">
		<select name="imunisasi" id="imunisasi" class="form-control">
				<?php $ambil = query("SELECT * FROM imunisasi"); ?>
				<?php foreach($ambil as $imun): ?>
			<option value="<?=$imun['id_imun']?>"><?=$imun['nama_imunisasi']?></option> 
				<?php endforeach; ?>
		</select>
	</div>

	<div class="form-group">
		<label>Status</label><br>
		<input type="radio" name="status" value="Sudah" <?php if($data['status']=='Sudah') echo 'checked'?>> Sudah
		<br>
      	<input type="radio" name="status" value="Belum" <?php if($data['status']=='Belum') echo 'checked'?>> Belum
	</div>
	
	<button class="btn btn-primary" type="submit" name="submit">Ubah</button>
</form><br><br>

<?php 
if (isset($_POST["submit"]) ){

	//cek apakah data berhasil diubah atau tidak
	if (ubahimun($_POST) > 0){
		echo "<div class='alert alert-info'> Data Berhasil Diubah </div>";
		echo "
			<script>
				document.location.href = 'index.php?halaman=dataimunisasi';
			</script>
		";
	} else{
		echo "<script>
				alert('data gagal diubah');
				// document.location.href = 'index.php?halaman=data';
			</script>";
	}

}

?>