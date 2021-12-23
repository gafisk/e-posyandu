<h2> Detail Timbangan </h2>
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

<?php endforeach; ?>

<?php $menu = query("SELECT tahun FROM data_timbangan GROUP BY tahun desc"); ?>
        <?php foreach($menu as $row): ?>

<h2><?= $row['tahun'];?></h2>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Bulan</th>
			<th>Tahun</th>
			<th>Berat Badan</th>
			<th>Tinggi Badan</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$tahun=$row['tahun'];
		$menu = query("SELECT * FROM data_timbangan JOIN bulan_timbangan ON data_timbangan.id_bulan_timbangan=bulan_timbangan.id_bulan WHERE id_balita=$id AND tahun=$tahun ORDER BY id_bulan_timbangan DESC"); ?>
		<?php $i = 1; ?>
        <?php foreach($menu as $row): ?>
        <tr>
        	<td><?= $i; ?></td>
        	<td><?php echo $row['tahun']; ?></td>
			<td><?php echo $row['nama_bulan']; ?></td>
			<td><?php echo $row['berat_badan']; ?> Kg</td>
			<td><?php echo $row['tinggi_badan']; ?> Cm</td>
			<td>
				<a href="index.php?halaman=ubahtimbangan&id=<?php echo $row['id_data_timbangan']; ?>" 
					class="btn btn-warning btn-circle btn-sm">
					<i class="fas fa-edit"></i>
				</a>
				<a href="index.php?halaman=hapustimbangan&id=<?php echo $row['id_data_timbangan']; ?>" 
					class="btn btn-danger btn-circle btn-sm">
					<i class="fas fa-trash"></i>
				</a>
			</td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
	</tbody>
</table>
<?php endforeach; ?>