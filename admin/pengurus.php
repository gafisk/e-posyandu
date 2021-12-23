<h2>Data Pengurus</h2>

<?php $ambil = query("SELECT * FROM data_posyandu JOIN pengurus ON pengurus.id_posyandu=data_posyandu.id_posyandu"); ?>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>NIK Pengurus</th>
			<th>Username Pengurus</th>
			<th>Password</th>
			<th>Nama Posyandu</th>
			<th>Alamat</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		
		<?php $i = 1; ?>
        <?php foreach($ambil as $row): ?>
		<tr>
			<td><?= $i; ?></td>
			<td><?php echo $row['nik_pengurus']; ?></td>
			<td><?php echo $row['username_pengurus']; ?></td>
			<td><?php echo $row['password_pengurus']; ?></td>
			<td><?php echo $row['nama_posyandu']; ?></td>
			<td>RT <?= $row['rt']; ?>/<?= $row['rw']; ?>, 
				<?= $row['desa']; ?>, 
				<?= $row['kecamatan']; ?>, 
				<?= $row['kabupaten']; ?>, 
				<?= $row['provinsi']; ?>
				
			</td>
			<td><a href="index.php?halaman=ubahpengurus&id=<?php echo $row['id_pengurus']; ?>" 
					class="btn btn-warning btn-circle"><i class="fas fa-edit"></i></a>
				<a href="index.php?halaman=hapuspengurus&id=<?php echo $row['id_pengurus']; ?>" 
					class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></a></td>
		</tr>
		<?php $i++; ?>
        <?php endforeach; ?>

	</tbody>
</table>


<a href="index.php?halaman=tambahpengurus" class="btn btn-primary btn-icon-split">
	<span class="icon text-white-50">
			<i class="fas fa-plus"></i>
	</span>
	<span class="text">Pengurus</span>
</a>
<br><br>