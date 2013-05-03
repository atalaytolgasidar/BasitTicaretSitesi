<?php 
$urunid=$_GET['id'];
session_start();
if($_SESSION['oturum']){
$kullanici=$_SESSION['oturum'];
include("baglanti.php");
$yaz=mysql_fetch_array(mysql_query("select * from uruntb where ID='$urunid'"));
$sondurum=$yaz['Stok']-1;
$urunad=$yaz['UrunAd'];
$fiyat=$yaz['Fiyat'];
echo $sondurum;
mysql_query("Update uruntb set Stok='$sondurum' where ID='$urunid'");
//bu alana kadar stok sayısını düşürdük.
mysql_query("Insert into sepettb (KAd,UrunAd,Fiyat)values('$kullanici','$urunad','$fiyat')");
header("Location:urungoster.php");
}
else{
	echo "Oturum açmadınız";
}
?>