﻿<?php include("baglanti.php");session_start(); 
if(!($_SESSION['oturum'])){
	header("Location:uyegiris.php");
}
$kul=$_SESSION['oturum'];
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sepet</title>
</head>

<body>
<table border="1" width="80%" style="margin-left:auto; margin-right:auto;">
<tr>
<?php 
$tarih=date("d.m.Y");
if(@$_SESSION['oturum']){
	//eğer üye girişi yapılmışsa bu linkler gözükecek
	$kad=$_SESSION['oturum'];
	$verial=mysql_query("Select Count(*) AS DF from sepettb where Durum='0' and KAd='$kad'");
	$adet =mysql_result( $verial , 0, 'DF') ;
	echo "<td><a href='urungoster.php'>Anasayfa</a></td><td><a href='profilayar.php'>Profil</a></td><td><a href='sepet.php'>Sepetinizde ".$adet." adet ürün bulunmaktadır.</a></td><td><a href='cikis.php'>Çıkış</a></td>";
}
else{
	//eğer kullanıcı girişi yapmadıysa bu linkler gözükecek.
	echo "<td><a href='urungoster.php'>Anasayfa</a></td><td><a href='kayitol.php'>Üye Ol</a></td><td><a href='uyegiris.php'>Üye Giriş</a></td><td>".$tarih."</td>";
}
?>
</tr>
<tr><td colspan="4">
<center><h2>Sepetinizdeki Ürünler</h2></center>
<center><table border="1" cellpadding="0" style="margin:10px; width:400px;" cellspacing="0">
<tr><td align="center">Ürün ad</td><td align="center">Fiyat</td><td align="center">Durum</td></tr>
<?php 
$sorgu=mysql_query("Select * from sepettb where KAd='$kul'");
while($yaz=mysql_fetch_array($sorgu)){

?>
<tr><td><?php echo  $yaz['UrunAd'] ?></td><td><?php echo  $yaz['Fiyat'] ?></td>
<td><?php $durum=$yaz['Durum'];
if($durum==0){echo "Ödenmedi";} else{echo "Ödendi";}

 ?>
 <?php if($durum==0){ ?>
 <a href="ode.php?sepetid=<?php echo $yaz['ID'] ?>">ÖDE</a><?php }?>
 
 </td></tr>
<?php }?>
</table></center>
</td>
</tr>
<tr><td colspan="4" align="center"><b>Tüm Hakları Saklıdır 2013</b></td></tr>
</table>
</body>
</html>