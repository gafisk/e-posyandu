<h2> Tambah Data Posyandu</h2>

<form method="post">
	<div class="form-group">
		<label>Nama Posyandu</label>
		<input type="text" class="form-control" name="nama">
	</div>
	<div class="form-group">
		<label>RT</label>
		<input type="text" class="form-control" name="rt">
	</div>
	<div class="form-group">
		<label>RW</label>
		<input type="text" class="form-control" name="rw">
	</div>
	<div class="form-group">
		<label>Desa</label>
		<input type="text" class="form-control" name="desa">
	</div>
	<div class="form-group">
		<label>Kecamatan</label>
		<input type="text" class="form-control" name="kecamatan">
	</div>
	<div class="form-group">
		<label>Kabupaten</label>
		<input type="text" class="form-control" name="kabupaten">
	</div>
	<div class="form-group">
		<label>Provinsi</label>
		<input type="text" class="form-control" name="provinsi">
	</div>
	<button class="btn btn-primary" type="submit" name="submit">Tambah</button>
</form>
<br>

<?php 
if (isset($_POST["submit"]) ){

  //cek apakah data berhasil ditambahkan atau tidak
  if (tambahposyandu($_POST) > 0){
    echo "<div class='alert alert-info'> Data Tersimpan </div>";
    echo "
		<script>
			document.location.href = 'index.php?halaman=posyandu';
		</script>

	";
  } 

}

?>