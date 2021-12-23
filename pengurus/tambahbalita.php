<h2> Tambah Data Balita </h2>
<?php $id = $_SESSION['pengurus']['id_posyandu'];?>
<hr>

<form method="post">
	<div class="form-group">
		<label>NIK Balita</label>
		<input type="text" class="form-control" name="nik_balita">
	</div>

	<div class="form-group">
		<label>Nama Balita</label>
		<input type="text" class="form-control" name="nama_balita">
	</div>

    <div class="form-group">
    	<label>Jenis Kelamin</label><br>
	    <input type="radio" name="jenis_kelamin" value="L"> L<br>
	    <input type="radio" name="jenis_kelamin" value="P"> P<br>
    </td>
	</div>

	<div class="form-group">
		<label>Tanggal Lahir</label>
		<input type="date" class="form-control" name="tanggal_lahir">
	</div>

	<div class="form-group">
		<label>Nama Ayah</label>
		<input type="text" class="form-control" name="nama_ayah">
	</div>

	<div class="form-group">
		<label>Nama Ibu</label>
		<input type="text" class="form-control" name="nama_ibu">
	</div>

	<div class="form-group">
		<label>Anak ke-</label>
		<input type="number" class="form-control" name="anak_ke">
	</div>

	<div class="form-group">
		<label>Berat Lahir (kg)</label>
		<input type="text" class="form-control" name="berat_lahir">
	</div>

	<div class="form-group">
		<label>Panjang Lahir (cm)</label>
		<input type="text" class="form-control" name="panjang_lahir">
	</div>

	<div class="form-group">
    	<label>IMD</label><br>
	    <input type="radio" name="IMD" value="ya"> ya <br>
	    <input type="radio" name="IMD" value="tidak"> tidak <br>
	</div>

	<div class="form-group">
    	<label>Buku KIA</label><br>
	    <input type="radio" name="buku_KIA" value="ada"> ada <br>
	    <input type="radio" name="buku_KIA" value="tidak ada"> tidak ada <br>
	</div>

	<button class="btn btn-primary" type="submit" name="submit" value="submit">Tambah</button>
	<br><br>
</form>
<!--
<?php
//Mengecek apakah ada nilai dengan nama jenis_kelamin yang dikirim dari form
if (isset($_POST['jenis_kelamin'])) {

    $jenis_kelamin=$_POST['jenis_kelamin'];
    echo "<br>".$jenis_kelamin;
}
?>-->

<?php 
if (isset($_POST["submit"]) ){

  //cek apakah data berhasil ditambahkan atau tidak
  if (tambahbalita($_POST, $id) > 0){
    echo "<div class='alert alert-info'> Data Tersimpan </div>";
    echo "
		<script>
			document.location.href = 'index.php?halaman=data';
		</script>

	";
  } 

}

?>