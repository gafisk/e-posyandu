<h2> Hapus </h2>

<?php

$id = $_GET["id"];

if (hapusbalita($id) > 0){
	echo "<div class='alert alert-info'> Data Berhasil Dihapus </div>";
	echo "
		<script>
			document.location.href = 'index.php?halaman=data';
		</script>

	";
} else{
	echo "<div class='alert alert-info'> Data Gagal Dihapus </div>";
	echo "
		<script>
			alert('data gagal dihapus');
			document.location.href = 'index.php?halaman=data';
		</script>

	";
}

?>