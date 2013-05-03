<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Başlıksız Belge</title>
</head>

<body><form method="post" action="admingiris.php">
<table>
<tr><td>Kullanıcı Adı</td><td><input type="text" name="txt1" /></td></tr>
<tr><td>Parola</td><td><input type="password" name="txt2" /></td></tr>
<tr><td colspan="2"><input type="submit" name="btn" /></td></tr>
</table>
</form>
<?php 
@$btn=$_POST['btn'];
if($btn)
{
	$ad=$_POST['txt1'];
	$parola=$_POST['txt2'];
	if($ad=="root" && $parola=="123")
	{
		session_start();
		$_SESSION['admin']=true;
		header("Location:adminpaneli.php");
	}
}
?>
</body>
</html>