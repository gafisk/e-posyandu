<?php
session_start();
$id = $_SESSION['pengurus']['id_posyandu'];

$conn = mysqli_connect("localhost", "root", "", "posyandu");

function query($query)
{
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function tampil_data()
{
	global $id;
	$menu = query("SELECT * FROM v_imunisasi JOIN data_balita ON v_imunisasi.nik_balita=data_balita.nik_balita WHERE data_balita.id_posyandu = $id ORDER BY tanggal_imunisasi");
	$i = 1;
	foreach ($menu as $row) : ?>
		<tr>
			<td><?= $i; ?></td>
			<td><?php echo $row['nama_balita']; ?></td>
			<td><?php echo $row['tanggal_imunisasi']; ?> WIB</td>
			<td><?php echo $row['nama_imunisasi']; ?></td>
			<td <?php
				if ($row['status'] == 'Sudah') {
					echo 'style="color: green;"';
				} else {
					echo 'style="color: red;"';
				}
				?>>
				<?php echo $row['status']; ?>

			</td>
		</tr><?php
				$i++;
			endforeach;
		}

		header("Content-type:application/vnd.ms-excel");
		header("Content-Disposition:attachment; filename=dataimunisasi.xls");
		header("Pragma: no-cache");
		header("Expires: 0");

				?>

<!DOCTYPE html>
<html>

<head>
	<title>Data Balita</title>
</head>

<body>
	<table border="1">
		<thead>
			<tr>
				<td colspan="5" style="height: 40; font-size: 20px; text-align: center; font-weight: bold;">Data
					Imunisasi</td>
			</tr>
			<tr style="height: 30px; vertical-align: middle; text-align: center;font-size: 16px;">
				<th>No</th>
				<th>Nama Balita</th>
				<th>Tanggal Imunisasi</th>
				<th>Jenis Imunisasi</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php
			tampil_data();
			?>
		</tbody>
	</table>
</body>

</html>