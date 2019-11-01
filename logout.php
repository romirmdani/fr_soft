<?php
mysql_query("UPDATE dt_user SET STATUS_LOG='N' where ID_USER=$b[ID_USER]")or die(mysql_error());
session_destroy();
 header("location: index.php");
echo '<script language="javascript">alert("Anda Telah Logout"); document.location="index.php";</script>';
?>