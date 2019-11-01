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
<body onload="myFunction()" style="margin:0;">
<?php
$query=mysql_query("UPDATE dt_user SET STATUS_LOG='N' where ID_USER=$_SESSION[ID_USER]")or die(mysql_error());

if ($query) {
	session_destroy();
  echo "<meta http-equiv='refresh' content='1 url=index.php'>";
} else {
echo "gagal";
}

?>
<div id="loader"></div>
<div style="display:none;" id="myDiv" class="animate-bottom"></div>
</body>