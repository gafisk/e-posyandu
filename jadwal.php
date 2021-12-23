<?php $id = $_SESSION['user']['nik_balita'];?>

<h2 class="section-title" style="color: #1977cc;">Jadwal Posyandu</h2>
<hr>

<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>No</th>
			<th>Tanggal</th>
			<th>Waktu</th>
			<th>Nama Kegiatan</th>
			
		</tr>
	</thead>
	<tbody>
		<?php $menu = query("SELECT * FROM jadwal JOIN data_balita ON jadwal.id_posyandu=data_balita.id_posyandu WHERE data_balita.nik_balita = $id ORDER BY tanggal"); ?>
		<?php $i = 1; ?>
        <?php foreach($menu as $row): ?>
		<tr>
			<td><?= $i; ?></td>
			<td><?php echo $row['tanggal']; ?></td>
			<td><?php echo $row['waktu']; ?> WIB</td>
			<td><?php echo $row['nama_kegiatan']; ?>
		</tr>
		<?php $i++; ?>
        <?php endforeach; ?>

	</tbody>
</table>