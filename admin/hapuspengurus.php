<?php

$id = $_GET["id"];

if (hapuspengurus($id) > 0){
	echo "<div class='alert alert-info'> Data Berhasil Dihapus </div>";
	echo "
		<script>
			document.location.href = 'index.php?halaman=pengurus';
		</script>

	";
} else{
	echo "<div class='alert alert-info'> Data Gagal Dihapus </div>";
	echo "
		<script>
			alert('data gagal dihapus');
			document.location.href = 'index.php?halaman=pengurus';
		</script>

	";
}

?>