<? ob_start(); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Üye giriş</title>
</head>

<body>
<form method="post" action="uyegiris.php">
<table>
<tr><td>Mail</td><td><input type="email" required name="txt1" /></td></tr>
<tr><td>Parola</td><td><input type="password" required name="txt2" /></td></tr>
<tr><td colspan="2"><input type="submit" name="btn" /></td></tr>
</table>
</form>
<?php 
@$btn=$_POST['btn'];
if($btn){
	@session_start();
	include("baglanti.php");
	 $mail2=$_POST['txt1'];
	 
	 $parola2=$_POST['txt2'];
	 
	 $yaz=mysql_fetch_array(mysql_query("select Ad from uyetb where Mail='$mail2' and Parola='$parola2'"));
if($yaz['Ad'])
{
	$_SESSION['oturum'] =$yaz['Ad'];
	header("Location:urungoster.php");

}
	 
	 
}
?>
</body>
</html>
<? ob_flush(); ?>
