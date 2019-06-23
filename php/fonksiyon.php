<?php
//define('_DIR', "/home/kodvizit/public_html/ynt/");

if(isset($_POST['cagrilanFonks']) && !empty($_POST['cagrilanFonks'])) {
    $cagrilanFonks = $_POST['cagrilanFonks'];
	if(isset($_POST['veri']) && !empty($_POST['veri']))
		$veri = $_POST['veri'];
	
    switch($cagrilanFonks) {
        case 'UyeGetir' : UyeGetir($veri);break;
    }
}
	function UyeGetir($id)
	{
		$sorgu = "SELECT * FROM v_uye ";
		 if(!empty($id))
        {
            $sorgu= "SELECT * FROM v_uye WHERE id =$id";
        }
        return SorguyuDiziyeCevir($sorgu);
	}

	function KomiteGetir()
	{
		  $sorgu= "SELECT * FROM komite";
		  return SorguyuDiziyeCevir($sorgu);
	}
	function UyeSil($id)
	{
		$sorgu = "DELETE FROM uye WHERE Id=$id";
		EkleSilGuncelle($sorgu);
	}
	
	function UyeGuncelle($veri)
	{
		$ad= $_POST["ad"];
		$soyad= $_POST["soyad"];
		$mail= $_POST["e-posta"];
		$adres= $_POST["adres"];
		$komiteid= $_POST["komite"];
		$fakulte= $_POST["fakulte"];
		$bolum= $_POST["bolum"];
		$sinif= $_POST["sinif"];
		$aciklama= $_POST["aciklama"];
		$adres= $_POST["adres"];
		$id = $_POST["id"];
		$sorgu = "UPDATE uye SET (ad='$ad',soyad='$soyad',mail='$mail',adres='$adres',komiteid= $komiteid,fakulte='$fakulte',bolum='$bolum',sinif='$sinif',aciklama='$aciklama') WHERE id =$id";
		EkleSilGuncelle($sorgu);
	}
	
	function PuanGuncelle($veri)
	{
		$sorgu = "INSERT INTO puan(uyeid,puan,sebep,tarih,ip,puanlayanid) ($uyeid,$puan,'$sebep',$tarih,$ip,$puanlayanid)";
		EkleSilGuncelle($sorgu);
	}
	
	function SorguyuDiziyeCevir($sorgu)
	{
		include("baglan.php");
		
		$sonuc = mysqli_query($bag, $sorgu);
        if (!$sonuc) {printf("HATA: %s\n", mysqli_error($bag));exit();}
		
        $liste = array();
        while ($nesne=mysqli_fetch_object($sonuc))
        {
            $liste[]= $nesne;
        }
		if(isset($_POST['cagrilanFonks']))
		echo json_encode($liste,JSON_UNESCAPED_UNICODE);
        return $liste;
	}
	function EkleSilGuncelle($sorgu)
	{
		include("baglan.php");
		
		if($bag->query($sorgu) === FALSE)
		{
			printf("HATA: %s\n", mysqli_error($bag));exit();
		}
			
		
	}
?>