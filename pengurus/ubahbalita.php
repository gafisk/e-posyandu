<h2> Ubah Data Balita </h2>
<hr>

<?php
$id = $_GET["id"];
$data = query("SELECT * FROM data_balita WHERE id_balita = $id")[0];
?>

<form method="post" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?= $data["id_balita"]; ?>">
	<div class="form-group">
		<label>NIK Balita</label>
		<input type="text" class="form-control" name="nik_balita" 
				value="<?= $data["nik_balita"]; ?>">
	</div>
	<input type="hidden" name="id_posyandu" value="<?= $data["id_posyandu"]; ?>">
	<div class="form-group">
		<label>Nama Balita</label>
		<input type="text" class="form-control" name="nama_balita" 
				value="<?= $data["nama_balita"]; ?>">
	</div>
	<div class="form-group">
		<label>Jenis Kelamin</label><br>
		<input type="radio" name="jenis_kelamin" value="L" <?php if($data['jenis_kelamin']=='L') echo 'checked'?>> L
		<br>
      	<input type="radio" name="jenis_kelamin" value="P" <?php if($data['jenis_kelamin']=='P') echo 'checked'?>> P
	</div>
	<div class="form-group">
		<label>Tanggal Lahir</label>
		<input type="date" class="form-control" name="tanggal_lahir"
				value="<?= $data["tanggal_lahir"]; ?>">
	</div>
	<div class="form-group">
		<label>Nama Ayah</label>
		<input type="text" class="form-control" name="nama_ayah" 
				value="<?= $data["nama_ayah"]; ?>">
	</div>
	<div class="form-group">
		<label>Nama Ibu</label>
		<input type="text" class="form-control" name="nama_ibu" 
				value="<?= $data["nama_ibu"]; ?>">
	</div>
	<div class="form-group">
		<label>Anak Ke-</label>
		<input type="number" class="form-control" name="anak_ke" 
				value="<?= $data["anak_ke"]; ?>">
	</div>
	<div class="form-group">
		<label>Berat Lahir (kg)</label>
		<input type="text" class="form-control" name="berat_lahir" 
				value="<?= $data["berat_lahir"]; ?>">
	</div>
	<div class="form-group">
		<label>Panjang Lahir (cm)</label>
		<input type="text" class="form-control" name="panjang_lahir" 
				value="<?= $data["panjang_lahir"]; ?>">
	</div>
	<div class="form-group">
		<label>IMD</label><br>
		<input type="radio" name="IMD" value="ya" <?php if($data['IMD']=='ya') echo 'checked'?>> ya
		<br>
      	<input type="radio" name="IMD" value="tidak" <?php if($data['IMD']=='tidak') echo 'checked'?>> tidak
	</div>
	<div class="form-group">
		<label>Buku KIA</label><br>
		<input type="radio" name="buku_KIA" value="ada" <?php if($data['buku_KIA']=='ada') echo 'checked'?>> ada
		<br>
      	<input type="radio" name="buku_KIA" value="tidak ada" <?php if($data['buku_KIA']=='tidak ada') echo 'checked'?>> tidak ada
	</div>
	
	<button class="btn btn-primary" type="submit" name="submit">Ubah</button>
</form>
<br>

<?php 
if (isset($_POST["submit"]) ){

	//cek apakah data berhasil diubah atau tidak
	if (ubahbalita($_POST) > 0){
		echo "<div class='alert alert-info'> Data Berhasil Diubah </div>";
		echo "
			<script>
				document.location.href = 'index.php?halaman=data';
			</script>
		";
	} else{
		echo "<script>
				alert('data gagal diubah');
				document.location.href = 'index.php?halaman=data';
			</script>";
	}

}

?>