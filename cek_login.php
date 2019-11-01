 <style type="text/css">
      
/* Center the loader */

#loader {
position: absolute;
left: 50%;
top: 50%;
z-index: 1;
width: 150px;
height: 150px;
margin: -75px 0 0 -75px;
border: 16px solid #f3f3f3;
border-radius: 50%;
border-top: 16px solid #3498db;
width: 120px;
height: 120px;
-webkit-animation: spin 2s linear infinite;
animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
0% { -webkit-transform: rotate(0deg); }
100% { -webkit-transform: rotate(360deg); }
}
@keyframes spin {
0% { transform: rotate(0deg); }
100% { transform: rotate(360deg); }
}
/* Add animation to "page content" */
.animate-bottom {
position: relative;
-webkit-animation-name: animatebottom;
-webkit-animation-duration: 1s;
animation-name: animatebottom;
animation-duration: 1s
}

@-webkit-keyframes animatebottom {
from { bottom:-100px; opacity:0 }
to { bottom:0px; opacity:1 }
}
@keyframes animatebottom {
from{ bottom:-100px; opacity:0 }
to{ bottom:0; opacity:1 }
}
</style>

	<!---Sweeet Alert-->
	<link rel="stylesheet" type="text/css" href="css/sweetalert.min.css">
	<script type="text/javascript" src="css/sweetalert.min.js"></script>

 <script>
// Loading Page
var myVar;
function myFunction() {
myVar = setTimeout(showPage, 6000);
}

function showPage() {
document.getElementById("loader").style.display = "none";
document.getElementById("myDiv").style.display = "block";
}
</script> 
</head>
<body onload="myFunction()" style="margin:0;">
<?php
include 'koneksi.php';
$username =$_POST['username'];
$password =$_POST['password'];
if (empty($username)){


echo "<script> 
swal({
  title :'Ooops !',
  text : 'NIK belum di isi',
  type: 'warning'
});
</script>";
// echo "<script>alert('NIK belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=index.php'>";
}else if (empty($password)){
echo "<script>alert('Password belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=index.php'>";
}else{

$login = mysql_query("SELECT  * from dt_user where USERNAME='$username' and PASSWORD='$password'");
$row =mysql_fetch_array($login);

if ($row['USERNAME'] == '' AND $row['PASSWORD'] == '') {
	
echo "<script> 
swal({
  title :'Maaf !',
  text : 'Username Atau Password Salah',
  type: 'error'
});
</script>";
	// echo "<script>alert('NIK atau Password salah')</script>";
echo "<meta http-equiv='refresh' content='0 url=index.php'>";
  
} else{


 session_start(); // memulai fungsi session
 $_SESSION['USERNAME'] = $username;
 $_SESSION['ID_USER'] = $row['ID_USER'];
// echo "<script> 
// swal({
//   title :'Berhasil',
//   text : 'Selamat Datang $row[USERNAME]',
//   type: 'success'
// });
// </script>";

mysql_query("UPDATE dt_user SET STATUS_LOG='Y' where ID_USER=$row[ID_USER]")or die(mysql_error());

// Echo "<script>alert('Selamat Datang $row[nama]')</script>";
echo "<meta http-equiv='refresh' content='1 url=index.php'>";


	
}
}
?>
<div id="loader"></div>
<div style="display:none;" id="myDiv" class="animate-bottom"></div>
</body>