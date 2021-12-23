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
    $menu = query("SELECT * FROM v_bulan JOIN data_balita ON v_bulan.id_balita=data_balita.id_balita WHERE data_balita.id_posyandu = $id ORDER BY v_bulan.id_bulan_timbangan");

    $i = 1;


    foreach ($menu as $row) : ?>

        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $row['nama_balita']; ?></td>
            <td><?php echo $row['nama_bulan']; ?></td>
            <td><?php echo $row['tahun']; ?></td>
            <td><?php echo $row['berat_badan']; ?></td>
            <td><?php echo $row['tinggi_badan']; ?></td>
        </tr><?php
                $i++;
            endforeach;
        }

        header("Content-type:application/vnd.ms-excel");
        header("Content-Disposition:attachment; filename=jadwaltimbangan.xls");
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
                <td colspan="6" style="height: 40; font-size: 20px; text-align: center; font-weight: bold;">Data
                    Timbangan</td>
            </tr>
            <tr style="height: 30px; vertical-align: middle; text-align: center;font-size: 16px;">
                <th>No</th>
                <th>Nama Balita</th>
                <th>Bulan</th>
                <th>Tahun</th>
                <th>Berat Badan</th>
                <th>Tinggi Badan</th>
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