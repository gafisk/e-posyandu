<?php $id = $_SESSION['pengurus']['id_posyandu'];?>

<h2>Data Imunisasi</h2>
<hr>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Balita</th>
			<th>Tanggal Imunisasi</th>
			<th>Jenis Imunisasi</th>
			<th>Status</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $menu = query("SELECT * FROM v_imunisasi JOIN data_balita ON v_imunisasi.nik_balita=data_balita.nik_balita WHERE data_balita.id_posyandu = $id ORDER BY tanggal_imunisasi"); ?>
		<?php $i = 1; ?>
        <?php foreach($menu as $row): ?>
		<tr>
			<td><?= $i; ?></td>
			<td><?php echo $row['nama_balita']; ?></td>
			<td><?php echo $row['tanggal_imunisasi']; ?> WIB</td>
			<td><?php echo $row['nama_imunisasi']; ?></td>
			<td <?php 
				if($row['status']=='Sudah')
					{
						echo 'style="color: green;"';

					} else {
						echo 'style="color: red;"';
					}
				?>>
				<?php echo$row['status']; ?>
				
			</td>
			<td><a href="index.php?halaman=ubahimunisasi&id=<?php echo $row['id_data_imunisasi']; ?>" 
					class="btn btn-warning btn-circle"><i class="fas fa-edit"></i></a>
				<a href="index.php?halaman=hapusimunisasi&id=<?php echo $row['id_data_imunisasi']; ?>" 
					class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></a></td>
		</tr>
		<?php $i++; ?>
        <?php endforeach; ?>

	</tbody>
</table>

<a href="index.php?halaman=tambahimunisasi" class="btn btn-primary btn-icon-split">
	<span class="icon text-white-50">
			<i class="fas fa-plus"></i>
	</span>
	<span class="text">Data Imunisasi</span>
</a>
<a href="../printdataimunisasi.php" class="btn btn-success btn-icon-split">
	<span class="icon text-white-50">
			<i class="fas fa-print"></i>
	</span>
	<span class="text">Cetak</span>
</a>
<br>