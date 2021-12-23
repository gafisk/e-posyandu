<h2>Detail</h2>
<?php $id = $_SESSION['pengurus']['id_posyandu'];?>
<hr>

<?php $menu = query("SELECT * FROM data_balita WHERE id_posyandu = $id ORDER BY nama_balita"); ?>
<?php foreach($menu as $row): ?>
	<h2><?php echo $row['nama_balita']; ?></h2>
	<h5><?php echo $row['tanggal_lahir']; ?></h5><br>
	<h4>Anak ke-<?php echo $row['anak_ke']; ?></h4>
	<h4>Berat Lahir : <?php echo $row['berat_lahir']; ?></h4>
	<h4>Panjang Lahir : <?php echo $row['panjang_lahir']; ?></h4>
	<h4>IMD : <?php echo $row['IMD']; ?></h4>
	<h4>Buku KIA : <?php echo $row['buku_KIA']; ?></h4>

<?php endforeach; ?>
<br>
<a href="index.php?halaman=data" class="btn btn-warning">Kembali</a>