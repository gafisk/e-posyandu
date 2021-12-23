<?php $id = $_SESSION['pengurus']['id_posyandu'];?>

<h2>Jadwal Posyandu</h2>
<hr>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Tanggal</th>
			<th>Waktu</th>
			<th>Nama Kegiatan</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $menu = query("SELECT * FROM jadwal WHERE id_posyandu = $id ORDER BY tanggal"); ?>
		<?php $i = 1; ?>
        <?php foreach($menu as $row): ?>
		<tr>
			<td><?= $i; ?></td>
			<td><?php echo $row['tanggal']; ?></td>
			<td><?php echo $row['waktu']; ?> WIB</td>
			<td><?php echo $row['nama_kegiatan']; ?></td>
			<td><a href="index.php?halaman=ubahjadwal&id=<?php echo $row['id_jadwal']; ?>" 
					class="btn btn-warning btn-circle"><i class="fas fa-edit"></i></a>
				<a href="index.php?halaman=hapusjadwal&id=<?php echo $row['id_jadwal']; ?>" 
					class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></a></td>
		</tr>
		<?php $i++; ?>
        <?php endforeach; ?>

	</tbody>
</table>

<a href="index.php?halaman=tambah" class="btn btn-primary btn-icon-split">
	<span class="icon text-white-50">
			<i class="fas fa-plus"></i>
	</span>
	<span class="text">Jadwal</span>
</a>
<a href="../printjadwal.php" class="btn btn-success btn-icon-split">
	<span class="icon text-white-50">
			<i class="fas fa-print"></i>
	</span>
	<span class="text">Cetak</span>
</a>
<br><br>