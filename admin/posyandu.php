<h2>Data Posyandu</h2>

<?php $ambil = query("SELECT * FROM data_posyandu"); ?>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
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
			<td><?php echo $row['nama_posyandu']; ?></td>
			<td>RT <?= $row['rt']; ?>/<?= $row['rw']; ?>, 
				<?= $row['desa']; ?>, 
				<?= $row['kecamatan']; ?>, 
				<?= $row['kabupaten']; ?>, 
				<?= $row['provinsi']; ?>
				
			</td>
			<td><a href="index.php?halaman=ubahposyandu&id=<?php echo $row['id_posyandu']; ?>" 
					class="btn btn-warning btn-circle"><i class="fas fa-edit"></i></a>
				<a href="index.php?halaman=hapusposyandu&id=<?php echo $row['id_posyandu']; ?>" 
					class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></a></td>
		</tr>
		<?php $i++; ?>
        <?php endforeach; ?>

	</tbody>
</table>


<a href="index.php?halaman=tambahposyandu" class="btn btn-primary btn-icon-split">
	<span class="icon text-white-50">
			<i class="fas fa-plus"></i>
	</span>
	<span class="text">Posyandu</span>
</a>
<br><br>