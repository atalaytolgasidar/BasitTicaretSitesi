<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kayıt Ol</title>
</head>

<body>
<form method="post" action="kayitol.php">
<table>
<tr><td>Ad</td><td><input type="text" required name="txt1" /></td></tr>
<tr><td>Soyad</td><td><input type="text" required name="txt2" /></td></tr>
<tr><td>Mail</td><td><input type="email" required name="txt3" /></td></tr>
<tr><td>Parola</td><td><input type="password" required name="txt4" /></td></tr>
<tr><td>Parola tekrar</td><td><input type="password" required name="txt5" /></td></tr>
<tr><td>Tel</td><td><input type="text" name="txt6" required /></td></tr>
<tr><td colspan="2"><input type="submit" name="btn" /></td></tr>
</table> 
</form>
</body>
<?php 
@$btn=$_POST['btn'];
if($btn){
	$ad=$_POST['txt1'];
	$soyad=$_POST['txt2'];
	$mail=$_POST['txt3'];
	$parola=$_POST['txt4'];
	$parola2=$_POST['txt5'];
	$tel=$_POST['txt6'];
	include("baglanti.php");
	if($parola==$parola2){
	mysql_query("Insert into uyetb (Ad,Soyad,Mail,Parola,Tel)values('$ad','$soyad','$mail','$parola','$tel')") or die(mysql_error());
	session_start();
	$_SESSION['oturum']= $ad;
	}
	else{
		echo "Parolalar uyuşmuyor";
	}
}
?>
</html>