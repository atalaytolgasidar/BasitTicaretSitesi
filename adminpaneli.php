<?php include("baglanti.php"); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Başlıksız Belge</title>
</head>

<body>
<form method="post" action="adminpaneli.php" enctype="multipart/form-data">
<table>
<tr><td>Urun Adı</td><td><input type="text" name="txt1" /></td></tr>
<tr><td>Fiyat</td><td><input type="text" name="txt2" /></td></tr>
<tr><td>Stok</td><td><input type="text" name="txt3" /></td></tr>
<tr><td>Açıklama</td><td><input type="text" name="txt4" /></td></tr>
<tr><td>Fotoğraf</td><td><input name="dosya"  type="file" id="dosya" /></td></tr>
<tr><td colspan="2"><input type="submit" name="btn" /></td></tr>
</table>
</form>
<?php 
@$btn=$_POST['btn'];
if($btn)
{
	$gelen=$_FILES["dosya"]['tmp_name'];
	$hedef="resimler/".$_FILES["dosya"]['name'];
	if(is_uploaded_file($gelen))
	{
		$ad=$_POST['txt1'];
		$fiyat=$_POST['txt2'];
		$stok=$_POST['txt3'];
		$aciklama=$_POST['txt4'];
		if(empty($ad)||empty($fiyat)||empty($stok)||empty($aciklama))
			{
				die("Boş alan bırakmayınız.");
			}
			move_uploaded_file($gelen,$hedef);
			mysql_query("Insert into uruntb (UrunAd,Fiyat,Stok,Foto,Hakkinda) values ('$ad','$fiyat','$stok','$hedef','$aciklama')") or die("veri eklenmedi".mysql_error());
			echo "verileriniz eklendi.";
	}
}
?>
</body>
</html>