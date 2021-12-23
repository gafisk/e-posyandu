<h2> Tambah Data Timbangan </h2>
<hr>

<?php 
$id = $_GET['id'];

$ambil = query("SELECT * FROM data_balita WHERE id_balita= $id");
?>

<?php foreach($ambil as $row): ?>

<table class="table table-bordered">
	<tr>
		<th>Nama Balita</th>
		<th><?php echo$row['nama_balita']; ?></th>
	</tr>
	<tr>
		<th>NIK Balita</th>
		<th><?php echo$row['nik_balita']; ?></th>
	</tr>
	<tr>
		<th>Tanggal Lahir</th>
		<th><?php echo $row['tanggal_lahir']; ?></th>
	</tr>
	<tr>
		<th>Jenis Kelamin</th>
		<th>
			<?php 
				if($row['jenis_kelamin']=='L')
					{
						echo 'Laki-Laki';

					} elseif ($row['jenis_kelamin']=='P'){
						echo "Perempuan";
					} else {
						echo "Tidak Diketahui";
					}
			?>
		</th>
	</tr>
	<tr>
		<th>Nama Orang Tua</th>
		<th><?php echo $row['nama_ayah']; ?> & <?php echo $row['nama_ibu']; ?></th>
	</tr>
	
</table>


<br>

<form method="post">
	<input type="hidden" name="id" value="<?= $row["id_balita"]; ?>">
	<?php endforeach; ?>
	<div class="form-group">
		<select name="bulan_timbangan" id="bulan_timbangan" class="form-control">
			<option disabled selected> Bulan </option>
				<?php $ambil = query("SELECT * FROM bulan_timbangan"); ?>
				<?php foreach($ambil as $data): ?>
			<option value="<?=$data['id_bulan']?>"><?=$data['nama_bulan']?></option> 
				<?php endforeach; ?>
		</select>
	</div>

	<div class="form-group">
		<select name="tahun" id="tahun" class="form-control">
			<option disabled selected="selected">Tahun</option>
			<?php
			for($i=date('Y')+50; $i>=date('Y')-20; $i-=1){
			echo"<option value='$i'> $i </option>";
			}
			?>
		</select>
	</div>

	<div class="form-group">
		<label>Berat Badan (kg)</label>
		<input type="text" class="form-control" name="berat_badan">
	</div>

	<div class="form-group">
		<label>Tinggi Badan (cm)</label>
		<input type="text" class="form-control" name="tinggi_badan">
	</div>

	<button class="btn btn-primary" type="submit" name="submit" value="submit">Tambah</button>
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
  if (tambahtimbangan($_POST, $id) > 0){
    echo "<div class='alert alert-info'> Data Tersimpan </div>";
    echo "
		<script>
			document.location.href = 'index.php?halaman=timbangan';
		</script>

	";
  } 

}

?>
<br>