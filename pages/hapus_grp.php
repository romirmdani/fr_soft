<!-- <body onload="myFunction()" style="margin:0;">  -->
 <?php

include '../koneksi.php';
$id = $_GET['ID_GRP'];


mysql_query("delete from dt_grp where ID_GRP='$_GET[ID_GRP]'")or die(mysql_error());

 ?>
