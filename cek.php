<?php
include '../koneksi.php';

$nama_grp_brg = $_POST['nama_grp_brg'] ? $_POST['nama_grp_brg'] : '';

$sql = "SELECT COUNT(*) AS countUsr FROM dt_grp WHERE NAMA_GRP = '$nama_grp_brg'";
$query = mysql_query($sql);
$row = mysql_fetch_array($query);
$count = $row['countUsr'];

echo "$count";

// $cek_user=mysql_num_rows(mysql_query("SELECT NAMA_GRP FROM dt_grp WHERE NAMA_GRP='$nama_grp_brg'"));

// echo "$cek_user";
?>