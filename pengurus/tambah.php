<h2> Tambah Jadwal </h2>
<?php $id = $_SESSION['pengurus']['id_posyandu'];?>
<hr>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Tanggal</label>
		<input type="date" class="form-control" name="tanggal">
	</div>
	<div class="form-group">
		<label>Waktu</label>
		<input type="time" class="form-control" name="waktu">
	</div>
	<div class="form-group">
		<label>Nama Kegiatan</label>
		<input type="text" class="form-control" name="nama_kegiatan">
	</div>
	<button class="btn btn-primary" type="submit" name="submit">Tambah</button>
</form>

<?php 
if (isset($_POST["submit"]) ){

  //cek apakah data berhasil ditambahkan atau tidak
  if (tambah($_POST, $id) > 0){
    echo "<div class='alert alert-info'> Data Tersimpan </div>";
    echo "
		<script>
			document.location.href = 'index.php?halaman=jadwal';
		</script>

	";
  } 

}

?>