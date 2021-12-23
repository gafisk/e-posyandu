<?php

$id = $_GET["id"];

if (hapusimun($id) > 0){
	echo "<div class='alert alert-info'> Data Berhasil Dihapus </div>";
	echo "
		<script>
			document.location.href = 'index.php?halaman=dataimunisasi';
		</script>

	";
} else{
	echo "<div class='alert alert-info'> Data Gagal Dihapus </div>";
	echo "
		<script>
			alert('data gagal dihapus');
			document.location.href = 'index.php?halaman=dataimunisasi';
		</script>

	";
}

?>