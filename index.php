<!DOCTYPE html>
<html>
<head>
	<title>FR SOFT</title>
	<meta charset='utf-8'>
 <meta http-equiv="X-UA-Compatible" content="IE=edge">

 <link rel="icon" href="img/fr.png">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
 <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"> -->
 <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
 <link rel="stylesheet" type="text/css" href="css/tabel.css">
 <!-- 	<link rel="stylesheet" type="text/css" href="css/style.css"> -->
 <link rel="stylesheet" type="text/css" href="css/loading.css">
 <script type="text/javascript" src="js/jquery.js"></script>
 <script type="text/javascript" src="js/bootstrap.js"></script>
 <!---Sweeet Alert-->
 <link rel="stylesheet" type="text/css" href="css/sweetalert.min.css">
 <script type="text/javascript" src="css/sweetalert.min.js"></script>

 <script type="text/javascript" src="js/ajax.js"></script>


 <!--jquery idle-->
 <!--    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> -->
 <script type="text/javascript" src="jquery_idle/jquery.idle.js"></script>

 <link rel="stylesheet" type="text/css" href="DataTables/css/dataTables.jqueryui.min.css">
 <script type="text/javascript" src="DataTables/js/jquery.dataTables.js"></script>


<!--  <script type="text/javascript" src="menu_tree/jquery-1.5.1.min.js"></script> -->
 <script type="text/javascript" src="menu_tree/jquery.treeview.js"></script>                      
 <link rel="stylesheet" type="text/css" href="menu_tree/jquery.treeview.css" />  
 <script type="text/javascript">
   $(document).ready(function() {
    $("#menu-tree").treeview();
  });
</script>  

</head>
<style type="text/css">
</style>
<!-- <script>
// Loading Page
var myVar;
function myFunction() {
myVar = setTimeout(showPage, 6000);
}

function showPage() {
document.getElementById("loader").style.display = "none";
document.getElementById("myDiv").style.display = "block";
}
</script>  -->

<?php
include"koneksi.php";
date_default_timezone_set("Asia/Jakarta");
session_start();
$today=date("Y-m-d H:i:s");
$re = mysql_query("select * from dt_user where USERNAME = '".$_SESSION['USERNAME']."'" );
echo mysql_error();
if(mysql_num_rows($re) > 0)
{
}
else
{

session_destroy();
header("location: login.php");
}
$b=mysql_fetch_array($re);


if (isset($_SESSION["lastActivity"])) {
 if ($_SESSION['lastActivity'] + 30 * 60 < time()) {
      // last request was more than 30 minutes ago

      // mysql_query("UPDATE dt_user SET STATUS_LOG='N' where ID_USER=$_SESSION[ID_USER]")or die(mysql_error());
      session_unset(); // unset $_SESSION variable for the run-time 
      session_destroy(); // destroy session data in storage
        // echo "<meta http-equiv='refresh' content='1 url=index_user.php?p=logout'>";
      header('Location:index.php'); 
      //redirect to your home page
    }
  }

  $_SESSION["lastActivity"] = time();


  ?>




  <body style="background:;">
    <?php



    include 'navigasi.php';
    echo "<br><br><br>";

    $pages_dir = 'pages';
    if(!empty($_GET['p'])){
      $pages = scandir($pages_dir, 0);
      unset($pages[0], $pages[1]);

      $p = $_GET['p'];
      if(in_array($p.'.php', $pages)){
        include($pages_dir.'/'.$p.'.php');
      } else {
        echo 'Halaman tidak ditemukan! :(';
      }
    } else {
      include($pages_dir.'/home.php');
    }
    ?>
  </body>
  </html>
<script>
     $(document).idle({
         onIdle: function(){
             window.location="index.php?p=logout";                
         },
         idle: 3000000
    });

  </script>
