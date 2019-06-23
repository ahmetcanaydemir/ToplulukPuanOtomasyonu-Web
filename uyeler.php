<?php
include("header.php");
include("php/fonksiyon.php")
?>
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
		<tr>
			<th>İşlem</th>
			<th>Ad Soyad</th>
			<th>Komite</th>
			<th>Telefon</th>
			<th>Mail</th>
			<th>Puan</th>
			<th>Fakülte</th>
			<th>Bölüm / Sınıf</th>
		</tr>
	</thead>
	<tbody>

		<?php


		// $nesne = new elemanler();
		$liste = UyeGetir("");

		foreach ($liste as $eleman) {
			?>
			<tr class="odd gradeX">
				<td> <button type="button" class="btn btn-info goruntule" data-toggle="modal" data-target="#goruntleModal" data-whatever="@mdo" name="goruntule" id="<?php echo $eleman->id; ?>">Görüntüle</button></td>
				<td><?php echo $eleman->ad . " " . $eleman->soyad; ?></td>
				<td><?php echo $eleman->komite; ?></td>
				<td><?php echo $eleman->telefon; ?></td>
				<td><a href="mailto:<?php echo $eleman->mail; ?>"><?php echo $eleman->mail; ?></a></td>
				<td><span class="badge badge-pill badge-success" style="display:block; width:50%; margin:0 auto; font-size:20px;"><?php echo $eleman->puan; ?></span></td>
				<td><?php echo $eleman->fakulte; ?></td>
				<td><?php echo $eleman->bolum . "/" . $eleman->sinif . ". Sınıf"; ?></td>

			</tr>

		<?php
	}
	?>

	</tbody>
</table>



<div class="modal fade" id="goruntleModal" tabindex="-1" role="dialog" aria-labelledby="baslikModal" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="baslikModal">Üye Görüntüle</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group col-md-4">
						<input type="hidden" class="hidden" id="id" name="id">
						<label for="ad" class="col-form-label">Ad</label>
						<input type="text" class="form-control" id="ad" name="ad"></div>
					<div class="form-group col-md-4">
						<label for="soyad" class="col-form-label">Soyad</label>
						<input type="text" class="form-control" id="soyad" name="soyad"></div>
					<div class="form-group col-md-4">
						<label for="puan" class="col-form-label">Puan</label>
						<span class="badge badge-pill badge-success" style="display:block; width: 60px; font-size:20px;" id="puan"></span>
					</div>
					<div class="form-group col-md-6">
						<label for="komite" class="col-form-label">Komite</label>
						<select name="komite" id="komite" class="form-control">
							<option selected value="">Komite Seçiniz</option>
							<?php
							$liste = KomiteGetir();
							foreach ($liste as $eleman) {
								echo '<option value="' . $eleman->id . '">' . $eleman->ad . '</option>';
							}
							?>
						</select>

					</div>
					<div class="form-group col-md-6">
						<label for="dosya-adi" class="col-form-label">Görevler</label>
						<div class="form-control" id="dosya-adi"></div>
					</div>
					<div class="form-group col-md-6">
						<label for="telefon" class="col-form-label">Telefon</label>
						<input type="text" class="form-control" id="telefon" name="telefon">
					</div>
					<div class="form-group col-md-6">
						<label for="e-posta" class="col-form-label">Mail</label>
						<input type="text" class="form-control" id="e-posta" name="e-posta">
					</div>
					<div class="form-group col-md-4">
						<label for="fakulte" class="col-form-label">Fakülte</label>
						<input type="text" class="form-control" id="fakulte" name="fakulte">
					</div>
					<div class="form-group col-md-4">
						<label for="bolum" class="col-form-label">Bölüm</label>
						<input type="text" class="form-control" id="bolum" name="bolum">
					</div>
					<div class="form-group col-md-4">
						<label for="sinif" class="col-form-label">Sınıf</label>
						<input type="text" class="form-control" id="sinif" name="sinif">
					</div>



					<div class="form-group col-md-6">
						<label for="adres" class="col-form-label">Adres</label>
						<textarea class="form-control" style="height:45px;" id="adres" name="adres"></textarea>
					</div>
					<div class="form-group col-md-6">
						<label for="aciklama" class="col-form-label">Not</label>
						<textarea style="height:45px;" class="form-control" id="aciklama" name="aciklama"></textarea>
					</div>
				</form>
				<label for="tablo-puanlar" class="col-form-label">Puanlandırmalar</label>
				<table width="100%" class="table table-striped table-bordered table-hover" id="tablo-puanlar">
					<thead>
						<tr>
							<th>Alınan Puan</th>
							<th>Sebep</th>
							<th>Tarih</th>
							<th>Puanlandıran</th>
						</tr>
					</thead>
					<tbody>

						<tr class="odd gradeX">
							<td>50</td>
							<td>Etkinliğe katılım</td>
							<td>07.10.2018</td>
							<td>Komite Üyesi</td>

						</tr>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">

				<button type="button" class="btn btn-danger" style="float:left;" id="sil">Sil</button>
				<button type="button" class="btn btn-success" style="float:left;" id="ekle">Yeni Üye</button>
				<button type="button" class="btn btn-warning" id="sifre-gonder">Puan Ver</button>
				<button type="button" class="btn btn-primary" id="guncelle">Güncelle</button>
			</div>
		</div>
	</div>
</div>

<!-- /.table-responsive -->
<script type="text/javascript">
	$(document).ready(function() {

		var bildirim_id = -1;
		$(".goruntule").click(function() {

			/* Post Degerleri Alınsın */
			bildirim_id = this.id;
			var deger = {
				cagrilanFonks: 'UyeGetir',
				veri: bildirim_id
			};
			var sayfa = "php/fonksiyon.php";

			$.ajax({
				type: "POST",
				url: sayfa,
				data: deger,
				success: function(result) {

					var obj = JSON.parse(result);

					$('#id').val(obj[0].id);
					$('#ad').val(obj[0].ad);
					$('#soyad').val(obj[0].soyad);
					$('#telefon').val(obj[0].telefon);
					$('#e-posta').val(obj[0].mail);
					$('#fakulte').val(obj[0].fakulte);
					$('#bolum').val(obj[0].bolum);
					$('#sinif').val(obj[0].sinif);
					$('#aciklama').val(obj[0].aciklama);
					$('#adres').val(obj[0].adres);
					$('#komite').val(obj[0].komiteid);
					$('#puan').text(obj[0].puan);

				},
				error: function(jqXhr, textStatus, errorThrown) {
					console.log(errorThrown);
				}
			});
		});

		$("#sil").click(function() {
			var deger = {
				cagrilanFonks: 'GeribildirimSil',
				veri: bildirim_id
			};
			var sayfa = "php/fonksiyon.php";

			$.ajax({
				type: "POST",
				url: sayfa,
				data: deger,
				success: function(result) {
					$("#goruntleModal").modal("hide");
					document.getElementById(bildirim_id).parentElement.parentElement.remove();
					alert("Silindi");
				},
				error: function(jqXhr, textStatus, errorThrown) {
					console.log(errorThrown);
				}
			});
		});

		$("#sifre-gonder").click(function() {
			var deger = 'cagrilanFonks=SifreMailGonder&sifre=' + $("#sifre").val() + '&e-posta=' + $("#e-posta").val();
			var sayfa = "php/fonksiyon.php";

			$.ajax({
				type: "POST",
				url: sayfa,
				data: deger,
				success: function(result) {
					alert(result);
					alert("Mail Gönderildi");
				},
				error: function(jqXhr, textStatus, errorThrown) {
					console.log(errorThrown);
				}
			});
		});

		$("#guncelle").click(function() {

			var deger = $('form').serialize + '&cagrilanFonks=UyeGuncelle';
			alert(deger);
			var sayfa = "php/fonksiyon.php";

			$.ajax({
				type: "POST",
				url: sayfa,
				data: deger,
				success: function(result) {
					alert("Güncellendi");
				},
				error: function(jqXhr, textStatus, errorThrown) {
					console.log(errorThrown);
				}
			});
		});
	});
</script>


<?php include("footer.php"); ?>
