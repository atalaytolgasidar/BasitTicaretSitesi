<?php 
include("baglanti.php");
$al=$_GET['sepetid'];
mysql_query("Update sepettb set Durum='1' where ID='$al'");
header("Location:sepet.php");
?>