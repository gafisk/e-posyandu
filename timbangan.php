<?php $id = $_SESSION['user']['nik_balita'];?>

<h2 class="section-title" style="color: #1977cc;">Data Timbangan</h2>
<hr>

<?php $menu = query("SELECT * FROM data_balita WHERE nik_balita = $id"); ?>

<?php foreach($menu as $row): ?>

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

<br>
<?php $ambil = query("SELECT tahun FROM data_timbangan GROUP BY data_timbangan.tahun desc"); ?>
 		
	
		<?php foreach($ambil as $data): ?>
<h2><?= $data['tahun'];?></h2>

<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>No</th>
			<th>Tahun</th>
			<th>Bulan</th>
			<th>Berat Badan</th>
			<th>Tinggi Badan</th>
		</tr>
	</thead>
	<tbody>
 		<?php 
 		$tahun =  $data['tahun'];
 		$ambil = query("SELECT data_balita.nama_balita, bulan_timbangan.nama_bulan, data_timbangan.tahun, data_timbangan.berat_badan, data_timbangan.tinggi_badan FROM data_balita, bulan_timbangan, data_timbangan WHERE  data_balita.id_balita=data_timbangan.id_balita AND data_timbangan.id_bulan_timbangan=bulan_timbangan.id_bulan AND data_balita.nik_balita=$id AND data_timbangan.tahun=$tahun ORDER BY data_timbangan.id_bulan_timbangan DESC"); ?>
 		
	
		<?php $i = 1; ?>
		<?php foreach($ambil as $data): ?>
        
		<tr>
			<td><?= $i; ?></td>
			<td><?php echo($data['tahun']); ?></td>
			<td><?php echo($data['nama_bulan']); ?></td>
			<td><?php echo($data['berat_badan']); ?></td>
			<td><?php echo($data['tinggi_badan']); ?></td>
		</tr>
		<?php $i++; ?>
        <?php endforeach; ?>
	</tbody>
</table>

<?php endforeach; ?>