<?php $id = $_SESSION['pengurus']['id_posyandu'];

$nama = query("SELECT nama_posyandu FROM data_posyandu WHERE id_posyandu=$id");
foreach($nama as $posyandu):
?>
<div class="row">
	<div class="col-lg-6">
		<img src="img/hero.jpg" width="100%" style="padding: 70px;">
	</div>
	<div class="col-lg-6">
		<br><br><br><br><br>
		<h1 style="font-weight: bolder; text-align: center;" class="text-uppercase">SELAMAT DATANG <?= $_SESSION['pengurus']['username_pengurus']; ?> </h1>
		<h3 class="text-uppercase" style="text-align: center;">sebagai pengurus di posyandu "<b><?= $posyandu['nama_posyandu']; ?></b>"</h3><br><br><br><br><br>
<?php endforeach; ?>
	</div>
</div>


