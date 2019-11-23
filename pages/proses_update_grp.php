
<?php
include '../koneksi.php';
$id_grp=$_POST['edit_id_grp'];
$nama_grp=$_POST['edit_nama_grp'];
$keterangan=$_POST['edit_ket_grp'];


// echo "$id_grp<br>$nama_grp<br>$keterangan";

	mysql_query("UPDATE dt_grp SET NAMA_GRP='$nama_grp', KET_GRP='$keterangan' where ID_GRP=$id_grp")or die(mysql_error());

 
?>



