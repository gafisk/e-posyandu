<h2>Data Balita</h2>
<?php $id = $_SESSION['pengurus']['id_posyandu'];?>
<hr>

<table class="table table-responsive table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>NIK Balita</th>
			<th>Nama Balita</th>
			<th>L/P</th>
			<th>Tanggal Lahir</th>
			<th>Nama Ayah</th>
			<th>Nama Ibu</th>
			<th>Anak Ke-</th>
			<th>Berat Lahir</th>
			<th>Panjang Lahir</th>
			<th>IMD</th>
			<th>Buku KIA</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $menu = query("SELECT * FROM data_balita WHERE id_posyandu = $id ORDER BY tanggal_lahir"); ?>
		<?php $i = 1; ?>
        <?php foreach($menu as $row): ?>
		<tr>
			<td><?= $i; ?></td>
			<td><?php echo $row['nik_balita']; ?></td>
			<td><?php echo $row['nama_balita']; ?></td>
			<td><?php echo $row['jenis_kelamin']; ?></td>
			<td><?php echo $row['tanggal_lahir']; ?></td>
			<td><?php echo $row['nama_ayah']; ?></td>
			<td><?php echo $row['nama_ibu']; ?></td>
			<td><?php echo $row['anak_ke']; ?></td>
			<td><?php echo $row['berat_lahir']; ?> kg</td>
			<td><?php echo $row['panjang_lahir']; ?> cm</td>
			<td <?php if ($row['IMD']=='tidak') echo 'style="color:red;"'; ?>>
				<?php echo $row['IMD']; ?>
					
			</td>
			<td <?php if ($row['buku_KIA']=='tidak ada') echo 'style="color:red;"'; ?>>
				<?php echo $row['buku_KIA']; ?>
					
			</td>

			<td>
				<a href="index.php?halaman=ubahbalita&id=<?php echo $row['id_balita']; ?>" 
					class="btn btn-warning btn-circle btn-sm"><i class="fas fa-edit"></i></a>
				<a href="index.php?halaman=hapusbalita&id=<?php echo $row['nik_balita']; ?>" 
					class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a></td>
		</tr>
		<?php $i++; ?>
        <?php endforeach; ?>

	</tbody>
</table>

<a href="index.php?halaman=tambahbalita" class="btn btn-primary btn-icon-split">
	<span class="icon text-white-50">
			<i class="fas fa-plus"></i>
	</span>
	<span class="text">Data Balita</span>
</a>
<a href="../printdatabalita.php" class="btn btn-success btn-icon-split">
	<span class="icon text-white-50">
			<i class="fas fa-print"></i>
	</span>
	<span class="text">Cetak</span>
</a>
<br><br>