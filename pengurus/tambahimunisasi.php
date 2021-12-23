<h2>Tambah Imunisasi</h2>
<hr>

<?php $id = $_SESSION['pengurus']['id_posyandu'];?>

<form method="post">
	<div class="form-group">
		<select name="nik_balita" id="nik_balita" class="form-control">
			<option disabled selected> NIK Balita </option>
				<?php $ambil = query("SELECT * FROM data_balita WHERE id_posyandu=$id"); ?>
				<?php foreach($ambil as $data): ?>
			<option value="<?=$data['nik_balita']?>"><?=$data['nik_balita']?></option> 
				<?php endforeach; ?>
		</select>
	</div>
	<div class="form-group">
		<label>Tanggal</label>
		<input type="date" class="form-control" name="tanggal">
	</div>
	<div class="form-group">
		<select name="imunisasi" id="imunisasi" class="form-control">
			<option disabled selected> Jenis Imunisasi </option>
				<?php $ambil = query("SELECT * FROM imunisasi"); ?>
				<?php foreach($ambil as $data): ?>
			<option value="<?=$data['id_imun']?>"><?=$data['nama_imunisasi']?></option> 
				<?php endforeach; ?>
		</select>
	</div>
	<div class="form-group">
    	<label>Status</label><br>
	    <input type="radio" name="status" value="Sudah"> Sudah <br>
	    <input type="radio" name="status" value="Belum"> Belum <br>
	</div>
	<button class="btn btn-primary" type="submit" name="submit">Tambah</button>
</form>

<?php 
if (isset($_POST["submit"]) ){

  //cek apakah data berhasil ditambahkan atau tidak
  if (tambahimun($_POST) > 0){
    echo "<div class='alert alert-info'> Data Tersimpan </div>";
    echo "
		<script>
			document.location.href = 'index.php?halaman=dataimunisasi';
		</script>

	";
  } 

}

?>