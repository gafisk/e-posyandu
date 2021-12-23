<?php $id = $_SESSION['pengurus']['id_posyandu'];?>
<?php
$semuadata = array();
$bulan = "-";
$tahun = "-";
if (isset($_POST['kirim'])) {
	$bulan = $_POST['bulan'];
	$tahun = $_POST['tahun'];
	$ambil = $conn->query("SELECT data_balita.nama_balita, bulan_timbangan.nama_bulan, data_timbangan.tahun, data_timbangan.berat_badan, data_timbangan.tinggi_badan FROM data_balita, bulan_timbangan, data_timbangan WHERE  data_balita.id_balita=data_timbangan.id_balita AND data_timbangan.id_bulan_timbangan=bulan_timbangan.id_bulan AND data_timbangan.id_bulan_timbangan=$bulan AND data_timbangan.tahun=$tahun");
	while ($pecah = $ambil->fetch_assoc()) {
	 	$semuadata[]=$pecah;
	}
}

?> 


<h1>Laporan Timbangan </h1><hr>

<h3>Laporan Timbangan Bulan ke-<?php echo $bulan; ?> Tahun <?php echo $tahun; ?></h3>
<!-- <pre><?php print_r($_SESSION['admin']); ?></pre> -->
<br>
<form method="post">
	<div class="row">
		<div class="form-group">
			<select name="bulan" id="bulan" class="form-control">
				<option disabled selected> Bulan </option>
					<?php $ambil = query("SELECT * FROM bulan_timbangan"); ?>
					<?php foreach($ambil as $data): ?>
				<option value="<?=$data['id_bulan']?>"><?=$data['nama_bulan']?></option> 
					<?php endforeach; ?>
			</select>
		</div>
		<div class="form-group">
			<select name="tahun" id="tahun" class="form-control">
				<option selected="selected">Tahun</option>
				<?php
				for($i=date('Y')+50; $i>=date('Y')-20; $i-=1){
				echo"<option value='$i'> $i </option>";
				}
				?>
			</select>
		</div>
		<div>
			
			<button class="btn btn-primary" name="kirim">Lihat</button>
		</div>
	</div>
</form>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Balita</th>
			<th>Bulan</th>
			<th>Tahun</th>
			<th>Berat Badan</th>
			<th>Tinggi Badan</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomer = 1; ?>
		<?php foreach ($semuadata as $key): ?>
		<tr>
			<td><?php echo $nomer; ?></td>
			<td><?php echo $key['nama_balita'] ?></td>
			<td><?php echo $key['nama_bulan']; ?></td>
			<td><?php echo $key['tahun']; ?></td>
			<td><?php echo $key['berat_badan']; ?></td>
			<td><?php echo $key['tinggi_badan']; ?></td>
		</tr>
		<?php $nomer++ ?>
		<?php endforeach; ?>
	</tbody>
</table>

<a href="../printdatatimbangan.php" class="btn btn-success btn-icon-split">
	<span class="icon text-white-50">
			<i class="fas fa-print"></i>
	</span>
	<span class="text">Cetak Laporan Keseluruhan</span>
</a><br><br>


<h2> Data Timbangan </h2>
<hr>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>NIK Balita</th>
			<th>Nama Balita</th>
			<th>Jenis Kelamin</th>
			<th>Tanggal Lahir</th>
			<th>Tambah Data</th>
		</tr>
	</thead>
	<tbody>
		<?php $menu = query("SELECT * FROM data_balita WHERE id_posyandu = $id ORDER BY tanggal_lahir"); ?>
		<?php $i = 1; ?>
        <?php foreach($menu as $row): ?>
		<tr>
			<td><?= $i; ?></td>
			<td><?php echo $row['nik_balita']; ?></td>
			<td><?php echo $row['nama_balita']; ?></td>
			<td><?php echo $row['jenis_kelamin']; ?></td>
			<td><?php echo $row['tanggal_lahir']; ?></td>
			<td>
				<a href="index.php?halaman=detailtimbangan&id=<?php echo $row['id_balita']; ?>" 
					class="btn btn-info btn-circle btn-sm">
					<i class="fas fa-info"></i>
				</a>
				<a href="index.php?halaman=tambahtimbangan&id=<?php echo $row['id_balita']; ?>" 
					class="btn btn-primary btn-icon btn-sm">
					<i class="fas fa-plus"></i>
				</a>
			</td>
		</tr>
		<?php $i++; ?>
        <?php endforeach; ?>

	</tbody>
</table>

<br><br>