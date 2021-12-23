<?php $id = $_SESSION['pengurus']['id_posyandu'];?>

<h2> Tambah Pengguna </h2>
<hr>

<form method="post">
	<div class="form-group">
		<label>Username</label>
		<input type="text" class="form-control" name="username">
	</div>
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
		<label>Password</label>
		<input type="text" class="form-control" name="password">
	</div>
	<button class="btn btn-primary" type="submit" name="submit">Tambah</button>
</form>

<?php 
if (isset($_POST["submit"]) ){

  //cek apakah data berhasil ditambahkan atau tidak
  if (tambahpengguna($_POST) > 0){
    echo "<div class='alert alert-info'> Data Tersimpan </div>";
    echo "
		<script>
			document.location.href = 'index.php?halaman=datapengguna';
		</script>

	";
  } 

}

?>