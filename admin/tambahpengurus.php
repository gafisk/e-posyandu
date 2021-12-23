

<h2> Tambah Pengurus </h2>
<hr>

<form method="post">
	<div class="form-group">
		<select name="nama" id="nama" class="form-control">
			<option disabled selected> Nama Posyandu </option>
				<?php $ambil = query("SELECT * FROM data_posyandu"); ?>
				<?php foreach($ambil as $data): ?>
			<option value="<?=$data['id_posyandu']?>"><?=$data['nama_posyandu']?></option> 
				<?php endforeach; ?>
		</select>
	</div>
	<div class="form-group">
		<label>NIK Pengurus</label>
		<input type="text" class="form-control" name="nik">
	</div>
	<div class="form-group">
		<label>Username Pengurus</label>
		<input type="text" class="form-control" name="username">
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
  if (tambahpengurus($_POST) > 0){
    echo "<div class='alert alert-info'> Data Tersimpan </div>";
    echo "
		<script>
			document.location.href = 'index.php?halaman=pengurus';
		</script>

	";
  } 

}

?>