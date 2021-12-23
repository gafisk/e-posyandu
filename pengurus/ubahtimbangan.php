<h2> Ubah Data Timbangan </h2>
<hr>

<?php 
$id = $_GET['id'];

$data = query("SELECT * FROM data_timbangan JOIN bulan_timbangan ON data_timbangan.id_bulan_timbangan=bulan_timbangan.id_bulan WHERE id_data_timbangan = $id")[0];
?>

<form method="post" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?= $data['id_data_timbangan']; ?>">
	<input type="hidden" name="id_balita" value="<?= $data['id_balita']; ?>">
	<div class="form-group">
		<select name="bulan_timbangan" id="bulan_timbangan" class="form-control">
				<?php $ambil = query("SELECT * FROM bulan_timbangan"); ?>
				<?php foreach($ambil as $bulan): ?>
			<option value="<?=$bulan['id_bulan'];?>"><?=$bulan['nama_bulan'];?></option> 
				<?php endforeach; ?>
		</select>
	</div>
	<div class="form-group">
		<select name="tahun" id="tahun" class="form-control">
			<?php
			for($i=date('Y')+50; $i>=date('Y')-20; $i-=1){
			echo"<option value='".$i."'>". $i ."</option>";
			}
			?>
		</select>
	</div>
	<div class="form-group">
		<label>Berat Badan (Kg)</label>
		<input type="text" class="form-control" name="berat_badan"
				value="<?= $data["berat_badan"]; ?>">
	</div>
	<div class="form-group">
		<label>Tinggi Badan (Cm)</label>
		<input type="text" class="form-control" name="tinggi_badan"
				value="<?= $data["tinggi_badan"]; ?>">
	</div>
	
	<button class="btn btn-primary" type="submit" name="submit">Ubah</button>
</form><br><br>

<?php 
if (isset($_POST["submit"]) ){

	//cek apakah data berhasil diubah atau tidak
	if (ubahtimbangan($_POST) > 0){
		echo "<div class='alert alert-info'> Data Berhasil Diubah </div>";
		echo "
			<script>
				document.location.href = 'index.php?halaman=timbangan';
			</script>
		";
	} else{
		echo "<script>
				alert('data gagal diubah');
				// document.location.href = 'index.php?halaman=timbangan';
			</script>";
	}

}

?>