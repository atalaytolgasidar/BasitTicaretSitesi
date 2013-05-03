<?php include("baglanti.php"); session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ürün Göster</title>
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

<?php
$sorgu=mysql_query("select * from uruntb");
while($yaz=mysql_fetch_array($sorgu)){
 ?>
 <table border="1" height="60" width="500">
<tr><td rowspan="2" width="50"><img src="<?php echo $yaz['Foto'] ?>" width="50" height="50" /></td><td><?php echo $yaz['UrunAd'] ?></td><td>Fiyat:<?php echo $yaz['Fiyat'] ?></td><td>Stok Adedi:<?php echo $yaz['Stok'] ?></td></tr>
<tr><td><?php echo $yaz['Hakkinda'] ?></td><td colspan="3"><a href="sepeteekle.php?id=<?php echo $yaz['ID'] ?>">Sepete ekle</a></td></tr>
</table>
<?php } ?>
</td>
</tr>
<tr><td colspan="4" align="center"><b>Tüm Hakları Saklıdır 2013</b></td></tr>
</table>
</body>
</html>