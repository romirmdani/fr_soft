<?php

// include"koneksi2.php";
include"fungsi_menu.php";

$sql=mysql_query("select * from dt_grp")or die(mysql_error());

while ($row = mysql_fetch_object($sql)) {
	       $data[$row->parent_id][] = $row;
      }
      $menu = get_menu($data);
      echo "$menu"; 
?>