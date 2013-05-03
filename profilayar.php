<?php include("baglanti.php"); session_start(); 
if(!($_SESSION['oturum']))
{ //Kullanıcının session ı yoksa bu sayfaya giremesin. Ve urungoster.php sayfasına yönlendirilsin.
	header("Location:urungoster.php");
}
$adcek=$_SESSION['oturum']; //Sessiondaki adı değişkene atadık.
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Profil ayarları</title>
</head>
<?php $sorgucuk=mysql_query("Select * from uyetb where Ad='$adcek'"); //textboxların valuesına eski profil bilgilerini çekmek için sorgu oluşturduk.
while($yaz=mysql_fetch_array($sorgucuk)){ ?>
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
<form method="post" action="profilayar.php">
<center><table border="1">
<tr><td>Ad</td><td><input type="text" readonly  value="<?php echo $yaz['Ad'] ?>" name="txt1" /></td></tr>
<tr><td>Soyad</td><td><input type="text" readonly   value="<?php echo $yaz['Soyad'] ?>" name="txt2" /></td></tr>
<tr><td>Mail</td><td><input type="email" required value="<?php echo $yaz['Mail'] ?>" name="txt3" /></td></tr>
<tr><td>Parola</td><td><input type="text" required value="<?php echo $yaz['Parola'] ?>" name="txt4" /></td></tr>
<tr><td>Parola Tekrar</td><td><input type="text" required  name="txt5" /></td></tr>
<tr><td>Telefon</td><td><input type="text" required value="<?php echo $yaz['Tel'] ?>" name="txt6" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" name="btn" value="Güncelle" /></td></tr>
</table>
</td>
</tr>
<tr><td colspan="4" align="center"><b>Tüm Hakları Saklıdır 2013</b></td></tr>
</table></center>
</form>
<?php }
@$btn=$_POST['btn'];
if($btn){
	//Formdan verileri al ve php de değişkenlere tanımla
	$ad=$_POST['txt1'];
	$soyad=$_POST['txt2'];
	$mail=$_POST['txt3'];
	$parola=$_POST['txt4'];
	$parola2=$_POST['txt5'];
	$tel=$_POST['txt6'];
	
	
	
	$sorgu2=mysql_query("select ID from uyetb where Ad='$adcek'");// $adcek deki ad ile eşit olan kayıtın idsini aldık.
	$id =mysql_result( $sorgu2 , 0, 'ID');// O id yi mysql_result ile çektik ve $id ye atadık.
	
	if($parola == $parola2){
		//Parola ile parola kontroldeki parolalar uyuşuyorsa işleme devam et
		mysql_query("Update uyetb SET Ad='$ad', Soyad='$soyad', Mail='$mail', Parola='$parola', Tel='$tel' where ID='$id'") or die("Veriler güncellenemedi".mysql_error());
		//Veritabanındaki üyenin verileri güncellendi. Verileri ID ye göre güncelledik çünkü aynı ada sahip başka kullanıcı olabilir. Eğer güncellenemezse hata oluşturacak ve işlem devam etmeyecek.
		session_destroy();
		$_SESSION['oturum']= $ad;
		header("Location:urungoster.php");
		
	}
	else{
		echo "Parolalar uyuşmuyor";
	}
}
?>
</body>
</html>