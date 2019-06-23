<?php
//define('_DIR', "/home/kodvizit/public_html/ynt/");

if(isset($_POST['cagrilanFonks']) && !empty($_POST['cagrilanFonks'])) {
    $cagrilanFonks = $_POST['cagrilanFonks'];
	if(isset($_POST['veri']) && !empty($_POST['veri']))
		$veri = $_POST['veri'];
	
    switch($cagrilanFonks) {
        case 'UyeleriGetir' : UyeleriGetir($veri);break;
    }
}
	function UyeleriGetir($id)
	{
		$sorgu = "SELECT * FROM uye ";
		 if(!empty($id))
        {
            $sorgu= "SELECT * FROM uye WHERE Id =$id";
        }
		
        return SorguyuDiziyeCevir($sorgu,2);
	}
	function SorguyuDiziyeCevir($sorgu,$tip)
	{
		include("php/baglan.php");
		$baglanti = $bag;

		$sonuc = mysqli_query($baglanti, $sorgu);
        if (!$sonuc) {printf("HATA: %s\n", mysqli_error($baglanti));exit();}
        $liste = array();
        while ($nesne=mysqli_fetch_object($sonuc))
        {
            $liste[]= $nesne;
        }
		if(isset($_POST['cagrilanFonks']))
		echo json_encode($liste,JSON_UNESCAPED_UNICODE);
        return $liste;
	}

?>