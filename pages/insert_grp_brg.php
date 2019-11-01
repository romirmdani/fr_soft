<?php 
include '../koneksi.php';
$nama = $_POST['nama_grp'];
$ket_brg = $_POST['ket_grp'];
$parent_id=$_POST['parent_id'];

$cekdata="select NAMA_GRP from DT_GRP where NAMA_GRP='$nama'";
$ada=mysql_query($cekdata) or die(mysql_error());
$count=mysql_num_rows($ada) ;

if ($count > 0) {

echo "$count";
}else{

	echo "$count";
	$query=mysql_query("insert into dt_grp values('','$nama','$parent_id','$ket_brg')")or die(mysql_error());
}
?>