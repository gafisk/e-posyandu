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
    $menu = query("SELECT * FROM jadwal WHERE id_posyandu = $id ORDER BY tanggal");
    $i = 1;
    foreach ($menu as $row) : ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $row['tanggal']; ?></td>
            <td><?php echo $row['waktu']; ?> WIB</td>
            <td><?php echo $row['nama_kegiatan']; ?></td>
        </tr><?php
                $i++;
            endforeach;
        }

        header("Content-type:application/vnd.ms-excel");
        header("Content-Disposition:attachment; filename=jadwalposyandu.xls");
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
                <td colspan="4" style="height: 40; font-size: 20px; text-align: center; font-weight: bold;">Jadwal
                    Posyandu</td>
            </tr>
            <tr style="height: 30px; vertical-align: middle; text-align: center;font-size: 16px;">
                <th>No</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Nama Kegiatan</th>
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