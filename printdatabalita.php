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
    $menu = query("SELECT * FROM data_balita WHERE id_posyandu = $id ORDER BY tanggal_lahir");
    $i = 1;
    foreach ($menu as $row) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?php echo $row['nik_balita']; ?></td>
            <td><?php echo $row['nama_balita']; ?></td>
            <td><?php echo $row['jenis_kelamin']; ?></td>
            <td><?php echo $row['tanggal_lahir']; ?></td>
            <td><?php echo $row['nama_ayah']; ?></td>
            <td><?php echo $row['nama_ibu']; ?></td>
            <td><?php echo $row['anak_ke']; ?></td>
            <td><?php echo $row['berat_lahir']; ?></td>
            <td><?php echo $row['panjang_lahir']; ?></td>
            <td <?php if ($row['IMD'] == 'tidak') echo 'style="color:red;"'; ?>>
                <?php echo $row['IMD']; ?>

            </td>
            <td <?php if ($row['buku_KIA'] == 'tidak ada') echo 'style="color:red;"'; ?>>
                <?php echo $row['buku_KIA']; ?>

            </td>
        </tr>
<?php $i++;
    endforeach;
}

header("Content-type:application/vnd.ms-excel");
header("Content-Disposition:attachment; filename=databalita.xls");
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
                <td colspan="12" style="height: 40; font-size: 20px; font-weight: bold; text-align: center;">Data Balita
                </td>
            </tr>
            <tr style="height: 30px; vertical-align: middle; text-align: center;font-size: 16px;">
                <th>No</th>
                <th>NIK Balita</th>
                <th>Nama Balita</th>
                <th>L/P</th>
                <th>Tanggal Lahir</th>
                <th>Nama Ayah</th>
                <th>Nama Ibu</th>
                <th>Anak Ke-</th>
                <th style="text-align: center;">Berat Lahir (kg)</th>
                <th style="text-align: center;">Panjang Lahir (cm)</th>
                <th>IMD</th>
                <th>Buku KIA</th>
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