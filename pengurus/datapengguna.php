<?php $id = $_SESSION['pengurus']['id_posyandu'];?>

<h2>Data Pengguna</h2>
<hr>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Username</th>
			<th>Password</th>
			<th>Nama Balita</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $ambil = query("SELECT * FROM data_balita JOIN pengguna ON pengguna.nik_balita=data_balita.nik_balita WHERE data_balita.id_posyandu=$id"); ?>
		<?php $i = 1; ?>
        <?php foreach($ambil as $row): ?>
        	
		<tr>
			<td><?= $i; ?></td>
			<td><?php echo $row['username_pengguna']; ?></td>
			<td><?php echo $row['password_pengguna']; ?></td>
			<td><?php echo $row['nama_balita']; ?></td>
			<td><a href="index.php?halaman=ubahpengguna&id=<?php echo $row['id_pengguna']; ?>" 
					class="btn btn-warning btn-circle"><i class="fas fa-edit"></i></a>
				<a href="index.php?halaman=hapuspengguna&id=<?php echo $row['id_pengguna']; ?>" 
					class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></a></td>
		</tr>
		<?php $i++; ?>
        <?php endforeach; ?>

	</tbody>
</table>


<a href="index.php?halaman=tambahpengguna" class="btn btn-primary btn-icon-split">
	<span class="icon text-white-50">
			<i class="fas fa-plus"></i>
	</span>
	<span class="text">Pengguna</span>
</a>
<br><br>