<?php $id = $_SESSION['user']['nik_balita'];?>

<h2 class="section-title" style="color: #1977cc;">Data Imunisasi</h2>
<hr>

<?php $menu = query("SELECT * FROM data_balita WHERE nik_balita=$id"); ?>

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

<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>No</th>
			<th>Tanggal</th>
			<th>Jenis Imunisasi</th>
			<th>Status</th>
			
		</tr>
	</thead>
	<tbody>
		<?php $menu = query("SELECT * FROM data_imunisasi JOIN imunisasi ON data_imunisasi.id_imunisasi=imunisasi.id_imun WHERE data_imunisasi.nik_balita = $id ORDER BY tanggal_imunisasi"); ?>
		<?php $i = 1; ?>
        <?php foreach($menu as $row): ?>
		<tr>
			<td><?= $i; ?></td>
			<td><?php echo $row['tanggal_imunisasi']; ?></td>
			<td><?php echo $row['nama_imunisasi']; ?></td>
			<td <?php 
				if($row['status']=='Sudah')
					{
						echo 'style="background: green; color: white;"';

					} else {
						echo 'style="background: red; color: white;"';
					}
				?>>
				<?php echo$row['status']; ?>
			</td>
		</tr>
		<?php $i++; ?>
        <?php endforeach; ?>

	</tbody>
</table>