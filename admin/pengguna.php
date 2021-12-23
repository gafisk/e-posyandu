<h2>Data Pengguna</h2>

<?php $ambil = query("SELECT data_balita.nama_balita, pengguna.username_pengguna, pengguna.password_pengguna, data_posyandu.nama_posyandu FROM data_balita, pengguna, data_posyandu WHERE data_balita.nik_balita = pengguna.nik_balita AND data_balita.id_posyandu = data_posyandu.id_posyandu "); 
?> 

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Posyandu</th>
			<th>Username Pengguna</th>
			<th>Nama Balita</th>
			<th>Password</th>
		</tr>
	</thead>
	<tbody>
		<?php $i = 1; ?>
        <?php foreach($ambil as $row): ?>
		<tr>
			<td><?= $i; ?></td>
			<td><?php echo $row['nama_posyandu']; ?></td>
			<td><?php echo $row['username_pengguna']; ?></td>
			<td><?php echo $row['nama_balita']; ?></td>
			<td><?php echo $row['password_pengguna']; ?></td>
		</tr>
		<?php $i++; ?>
        <?php endforeach; ?>

	</tbody>
</table>



<br><br>