<!-- Footer -->
<footer class="bg1">

	<div class="end-footer bg2">
		<div class="container">
			<div class="flex-sb-m flex-w p-t-22 p-b-22">
				<div class="p-t-5 p-b-5">
					<a href="#" class="fs-15 c-white"><i class="fa fa-tripadvisor" aria-hidden="true"></i></a>
					<a href="#" class="fs-15 c-white"><i class="fa fa-facebook m-l-18" aria-hidden="true"></i></a>
					<a href="#" class="fs-15 c-white"><i class="fa fa-twitter m-l-18" aria-hidden="true"></i></a>
				</div>

				<div class="txt17 p-r-20 p-t-5 p-b-5">
					RUMAH MAKAN KEDUNG ROSO</div>
			</div>
		</div>
	</div>
</footer>


<!-- Back to top -->
<div class="btn-back-to-top bg0-hov" id="myBtn">
	<span class="symbol-btn-back-to-top">
		<i class="fa fa-angle-double-up" aria-hidden="true"></i>
	</span>
</div>

<!-- Container Selection1 -->
<div id="dropDownSelect1"></div>

<!-- Modal Video 01-->
<div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">

	<div class="modal-dialog" role="document" data-dismiss="modal">
		<div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>

		<div class="wrap-video-mo-01">
			<div class="w-full wrap-pic-w op-0-0"><img src="images/icons/video-16-9.jpg" alt="IMG"></div>
			<div class="video-mo-01">
				<iframe src="https://www.youtube.com/embed/5k1hSu2gdKE?rel=0&amp;showinfo=0" allowfullscreen></iframe>
			</div>
		</div>
	</div>
</div>



<!--===============================================================================================-->
<script type="text/javascript" src="<?= base_url('asset/pato-master/') ?>vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?= base_url('asset/pato-master/') ?>vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?= base_url('asset/pato-master/') ?>vendor/bootstrap/js/popper.js"></script>
<script type="text/javascript" src="<?= base_url('asset/pato-master/') ?>vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?= base_url('asset/pato-master/') ?>vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?= base_url('asset/pato-master/') ?>vendor/daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="<?= base_url('asset/pato-master/') ?>vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?= base_url('asset/pato-master/') ?>vendor/slick/slick.min.js"></script>
<script type="text/javascript" src="<?= base_url('asset/pato-master/') ?>js/slick-custom.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?= base_url('asset/pato-master/') ?>vendor/parallax100/parallax100.js"></script>
<script type="text/javascript">
	$('.parallax100').parallax100();
</script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?= base_url('asset/pato-master/') ?>vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?= base_url('asset/pato-master/') ?>vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
<script src="<?= base_url('asset/pato-master/') ?>js/main.js"></script>
<script>
	window.setTimeout(function() {
		$(".alert").fadeTo(500, 0).slideUp(500, function() {
			$(this).remove();
		});
	}, 3000)
</script>
<script>
	console.log = function() {}
	$("#pembayaran").on('change', function() {
		$(".diskon").html($(this).find(':selected').attr('data-diskon'));
		$(".diskon").val($(this).find(':selected').attr('data-diskon'));


		$(".total").html($(this).find(':selected').attr('data-total'));
		$(".total").val($(this).find(':selected').attr('data-total'));


		$(".pembayaran").html($(this).find(':selected').attr('data-pembayaran'));
		$(".pembayaran").val($(this).find(':selected').attr('data-pembayaran'));
	});
</script>
<script>
	$("#hide").click(function() {
		$(".detail_pesanan").slideUp("slow");
	});
	$(".btn_detail").click(function() {
		console.log($(this).attr("data-id"));
		$.ajax({
			url: '<?= base_url() ?>pelanggan/cPesananSaya/detail_order/' + $(this).attr("data-id"),
			dataType: 'json',
			type: 'get',
			contentType: 'application/x-www-form-urlencoded',
			data: $(this).serialize(),
			success: function(data, textStatus, jQxhr) {
				$('#detail').html("");
				console.log(data.produk.length);
				for (var i = 0; i < data.produk.length; i++) {
					console.log(data.produk.length);
					$('#detail').append("<tr><td>" + data.produk[i].nama_produk + "</td><td>(" + data.produk[i].qty + ")x</td><td>Rp. " + data.produk[i].qty * (data.produk[i].harga) + "</td></tr>");
				}
				$('.detail_pesanan').slideDown('slow');
			},
			error: function(jqXhr, textStatus, errorThrown) {
				console.log(errorThrown);
			}
		});
	});
</script>
<script>
	console.log = function() {}
	$("#ongkir").on('change', function() {
		$(".ongkir").html($(this).find(':selected').attr('data-ongkir'));
		$(".ongkir").val($(this).find(':selected').attr('data-ongkir'));

		$(".vongkir").html($(this).find(':selected').attr('data-vongkir'));
		$(".vongkir").val($(this).find(':selected').attr('data-vongkir'));

		$(".vtotal").html($(this).find(':selected').attr('data-vtotal'));
		$(".vtotal").val($(this).find(':selected').attr('data-vtotal'));

		$(".total").html($(this).find(':selected').attr('data-total'));
		$(".total").val($(this).find(':selected').attr('data-total'));

	});
</script>
</body>

</html>