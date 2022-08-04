<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<title>
		<?= $this->setting->login_title . ' ' . ucwords($this->setting->sebutan_desa) . (($header['nama_desa']) ? ' ' . $header['nama_desa'] : '') . get_dynamic_title_page_from_path() ?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="robots" content="noindex">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<?php if (is_file(LOKASI_LOGO_DESA . 'favicon.ico')): ?>
		<link rel="shortcut icon" href="<?= base_url(LOKASI_LOGO_DESA . 'favicon.ico') ?>"/>
	<?php else: ?>
		<link rel="shortcut icon" href="<?= base_url('favicon.ico') ?>"/>
	<?php endif ?>
	<link rel="stylesheet" href="<?= asset('css/login-style.css') ?>" media="screen">
	<link rel="stylesheet" href="<?= asset('css/login-form-elements.css') ?>" media="screen">
	<link rel="stylesheet" href="<?= asset('css/daftar-form-elements.css') ?>" media="screen">
	<link rel="stylesheet" href="<?= asset('css/siteman_mandiri.css') ?>" media="screen">
	<link rel="stylesheet" href="<?= asset('bootstrap/css/bootstrap.bar.css') ?>" media="screen">
	<?php if (is_file('desa/pengaturan/siteman/siteman_mandiri.css')) : ?>
		<link rel='Stylesheet' href="<?= base_url('desa/pengaturan/siteman/siteman_mandiri.css') ?>" >
	<?php endif; ?>
	<link rel="stylesheet" href="<?= asset('css/mandiri_video.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>desa/layanan_mandiri.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= asset('bootstrap/css/font-awesome.min.css') ?>">
	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<script src="<?= asset('bootstrap/js/jquery.min.js') ?>"></script>
	
	<?php if ($cek_anjungan) : ?>
		<!-- Keyboard Default (Ganti dengan keyboard-dark.min.css untuk tampilan lain)-->
		<link rel="stylesheet" href="<?= asset('css/keyboard.min.css') ?>">
		<link rel="stylesheet" href="<?= asset('front/css/mandiri-keyboard.css') ?>">
	<?php endif; ?>

	<?php $this->load->view('head_tags') ?>
	<?php if ($latar_login_mandiri) : ?>
		<style type="text/css">
			body.login {
				background: url('<?= base_url($latar_login_mandiri); ?>');
			}
		</style>
	<?php endif; ?>

	<!-- Form Wizard - smartWizard -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/smartwizard@5/dist/css/smart_wizard_all.min.css">

	<script type="text/javascript">
	window.setTimeout("renderDate()",1);
	days = new Array("Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu");
	months = new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
	function renderDate()
	{
		var mydate = new Date();
		var year = mydate.getYear();
		if (year < 2000)
		{
			if (document.all)
				year = "19" + year;
			else
				year += 1900;
		}
		var day = mydate.getDay();
		var month = mydate.getMonth();
		var daym = mydate.getDate();
		if (daym < 10)
			daym = "0" + daym;
		var hours = mydate.getHours();
		var minutes = mydate.getMinutes();
		var seconds = mydate.getSeconds();
		if (hours <= 9)
			hours = "0" + hours;
		if (minutes <= 9)
			minutes = "0" + minutes;
		if (seconds <= 9)
			seconds = "0" + seconds;
		document.getElementById("jam").innerHTML = " "+days[day]+", "+daym+" "+months[month]+" "+year+"<br>"+hours+" : "+minutes+" : "+seconds;
		setTimeout("renderDate()",1000)
	}
	
</script>

</head>

<?php if ($this->setting->tampilan_anjungan == 1 && ! empty($this->setting->tampilan_anjungan_slider)) : ?>
	<div id="sliderv" class="video-internal" style="display: none;">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<?php foreach ($daftar_album as $key => $data) : ?>
					<div class="item <?= jecho($key, 0, 'active') ?> ">
						<img src="<?= AmbilGaleri($data['gambar'], 'sedang') ?>" alt="Los Angeles" style="width:100%;">
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
<?php endif; ?>

<?php if ($this->setting->tampilan_anjungan == 2 && ! empty($this->setting->tampilan_anjungan_video)) : ?>
	<div class="video-internal" id="videov" style="display: none;">
		<video loop <?= jecho($this->setting->tampilan_anjungan_audio, 0, 'muted') ?> poster="<?= base_url($latar_login_mandiri) ?>" class="video-internal-bg" id="videona">
			<source src="<?= $this->setting->tampilan_anjungan_video; ?>" type="video/mp4">
		</video>
	</div>
<?php endif; ?>

<body class="login">
	
	<div class="top-content">
		<div class="inner-bg">
		<div class="backgpage"></div>
			<div class="heading-mandiri flexleft">
				<div class="heading-mandiri-image">
				 <a href="<?= site_url(); ?>">   
				<img src="<?= gambar_desa($header['logo']) ?>" alt="Lambang Desa"/></div></a>
				<div class="heading-mandiri-title">
					<h1>Layanan Mandiri</h1>
					<h2><?= ucwords($this->setting->sebutan_desa) ?> <?= $header['nama_desa'] ?></h2>
				</div>
				<div class="right-top flexright"><div id="jam"></div></div>
			</div>

			<div class="container-custom">
				<div class="margin-min10">
					<div class="column-25">
					<div class="pd-lr-10">
						<div class="left-1">
							<div class="left-1-title">
							<h2>Selamat Datang di Layanan Mandiri <?= ucwords($this->setting->sebutan_desa) ?> <?= $header['nama_desa'] ?></h2>
							<p><?= $header['alamat_kantor'] ?><br/><?= ucwords($this->setting->sebutan_kecamatan) ?> <?= $header['nama_kecamatan'] ?>, <?= ucwords($this->setting->sebutan_kabupaten) ?> <?= $header['nama_kabupaten'] ?> - <?= $header['kode_pos'] ?></p>
							</div>
						</div>
						<div class="left-2 flexcenter">
							Silakan hubungi operator desa untuk mendapatkan kode PIN anda.
						</div>
					</div>
					</div>
					<div class="column-35">
					<div class="pd-lr-10">
						<div class="form-bottom">
							<?php if ($this->session->mandiri_wait == 1) : ?>
								<div class="error login-footer-top">
									<p id="countdown" style="color:red; text-transform:uppercase"></p>
								</div>
							<?php else : ?>
								<?php $data = $this->session->flashdata('notif') ?>

								<?php if ($this->session->daftar_verifikasi) : ?>
									<!-- View Pendaftaran -->
									<div class="login-form">
										<?php $this->load->view(MANDIRI . '/pendaftaran-verifikasi') ?>
									</div>
								<?php else : ?>
									<?php if ($this->session->daftar) : ?>
										<!-- View Pendaftaran -->
										<form id="validasi" action="<?= $form_action; ?>" method="post" class="login-form" enctype="multipart/form-data">
											<?php $this->load->view(MANDIRI . '/pendaftaran') ?>
										</form>
									<?php else : ?>
										<form id="validasi" action="<?= $form_action; ?>" method="post" class="login-form">
											<?php if (! $this->session->login_ektp) : ?>

												<?php if ($this->session->mandiri_try < 4) : ?>
													<div class="pin-salah flexcenter" id="notif">
														<p>NIK atau PIN salah.<br />Kesempatan mencoba <?= ($this->session->mandiri_try - 1) ?> kali lagi.</p>
													</div>
												<?php endif; ?>
												<?php if ($this->session->success == -1) : ?>
													<div class="pin-salah flexcenter" id="notif">
														<?= $this->session->error_msg ?>
													</div>
												<?php endif; ?>

												<!-- <?php if ($proses = $this->session->flashdata('proses_verifikasi')) : ?>
													<div class="callout callout-<?= ($proses['status'] == -1) ? 'danger' : 'success' ?>">
														<p><?= $proses['pesan']; ?></p>
													</div>
												<?php endif; ?> -->

												<div class="form-group form-login">
													<input type="text" autocomplete="off" class="form-control back-dark required <?= jecho($cek_anjungan['keyboard'] == 1, true, 'kbvnumber') ?>" name="nik" placeholder=" NIK">
												</div>
												<div class="form-group form-login">
													<input type="password" autocomplete="off" class="form-control back-dark required <?= jecho($cek_anjungan['keyboard'] == 1, true, 'kbvnumber') ?>" name="pin" placeholder="PIN" id="pin">
												</div>
												<div class="form-group flexcenter" style="margin:0 !important;height:4vh;">
													<center style="color:#bdbdbd !important;font-size:90%;"><input type="checkbox" id="checkbox" style="display: initial;"> Tampilkan PIN</center>
												</div>
												<div class="form-group">
													<button type="submit" class="btn btn-block flexcenter back-transparent"><b>MASUK</b></button>
												</div>
												<div class="form-group">
													<a href="<?= site_url('layanan-mandiri/masuk-ektp') ?>">
														<button type="button" class="btn btn-block flexcenter back-transparent"><b>MASUK DENGAN E-KTP</b></button>
													</a>
												</div>
												<?php if ($this->setting->tampilkan_pendaftaran) : ?>
												<div class="tombol1">
												<div class="tombol-margin1">
														<a href="<?= site_url('layanan-mandiri/daftar') ?>">
															<button type="button" class="btn btn-block flexcenter back-dark"><b>DAFTAR</b></button>
														</a>
												</div>
												</div>												
												<?php endif; ?>
											<?php else : ?>

												<?php if ($this->session->mandiri_try < 4) : ?>
													<div class="pin-salah flexcenter" id="notif">
														<p>PIN ATAU ID E-KTP salah.<br />Kesempatan mencoba <?= ($this->session->mandiri_try - 1) ?> kali lagi.</p>
													</div>
												<?php endif; ?>
												<div class="tempel-card">
													<?php if ($cek_anjungan) : ?>
														<!--Tempelkan e-KTP Pada Card Reader-->
													<?php endif; ?>
													<br>
													<img src="<?= asset('images/camera-scan.gif') ?>" alt="scanner" class="center">
												</div>
												<div class="form-group form-login" style="<?= jecho($cek_anjungan == 0 || ENVIRONMENT == 'development', false, 'width: 0; overflow: hidden;') ?>">
													<input name="tag" id="tag" autocomplete="off" placeholder="Tempelkan e-KTP Pada Card Reader" class="form-control back-dark required number" type="password" onkeypress="if (event.keyCode == 13){$('#'+'validasi').attr('action', '<?= $form_action; ?>');$('#'+'validasi').submit();}">
												</div>

												<?php if (! $cek_anjungan) : ?>

													<div class="form-group form-login">
														<input type="password" class="form-control back-dark required number" name="pin" placeholder="Masukan PIN" id="pin" autocomplete="off">
													</div>
													<div class="mb-2vh tombol1">
													<div class="tombol-margin1">
														<button type="submit" class="btn btn-block flexcenter back-transparent"><b>MASUK</b></button>
													</div>
													</div>
												<?php endif; ?>
												<div class="mb-2vh tombol2">
												<div class="tombol-margin2">
													<a href="<?= site_url('layanan-mandiri/masuk') ?>">
														<button type="button" class="btn btn-block flexcenter back-transparent"><b>DENGAN NIK</b></button>
													</a>
												</div>
												</div>
												
												<?php if ($this->setting->tampilkan_pendaftaran) : ?>
													<div class="tombol1">
												<div class="tombol-margin1">
														<a href="<?= site_url('layanan-mandiri/daftar') ?>">
															<button type="button" class="btn btn-block flexcenter back-dark"><b>DAFTAR</b></button>
														</a>
													</div>
													</div>
												<?php endif; ?>
											<?php endif; ?>
											
											<?php if ($this->setting->tampilkan_pendaftaran) : ?>
											<div class="tombol2">
											<div class="tombol-margin2">
												<a href="<?= site_url('layanan-mandiri/lupa-pin') ?>">
													<button type="button" class="btn btn-block flexcenter back-dark"><b>LUPA PIN</b></button>
												</a>
											</div>
											</div>
											<?php else : ?>
											<div class="form-group">
												<a href="<?= site_url('layanan-mandiri/lupa-pin') ?>">
													<button type="button" class="btn btn-block flexcenter back-dark"><b>LUPA PIN</b></button>
												</a>
											</div>
											<?php endif; ?>
										
										</form>
									<?php endif; ?>
								<?php endif; ?>
							<?php endif; ?>

						</div>
					</div>
					</div>
					<div class="column-40">
					<div class="pd-lr-10">
						<div class="video-view" style="background-image:url(<?= base_url($latar_login_mandiri); ?>);">
						<video loop muted autoplay poster="poster.jpg" class="video-view-bg">
							<source src="<?= base_url()?>desa/video.mp4" type="video/mp4">
						</video>
						</div>
					</div>
					</div>
				</div>
			</div>
			<script>
			$(document).ready(function(){if($("#jadwal-shalat").length){const a="https://api.banghasan.com/",s=`sholat/format/json/kota/kode/${KODE_KOTA}`,l=`sholat/format/json/jadwal/kota/${KODE_KOTA}/tanggal/${TANGGAL}`;try{$.ajax({url:a+s,type:"get",dataType:"json",crossDomain:!0,success:function(a){$("[data-name=kota]").html(a.kota[0].nama).removeClass("shimmer line-short")},error:function(a){$(".line-short").html('<span class="small"><i class="fa fa-exclamation-triangle pr-1"></i> Gagal memuat</span>'),$(".line-short").removeClass("shimmer line-short")}}),$.ajax({url:a+l,type:"get",dataType:"json",crossDomain:!0,success:function(a){$(".shimmer").removeClass("shimmer"),$("[data-name=tanggal]").html(`<span>${a.jadwal.data.tanggal}</span>`),$("[data-name=imsak]").html(`<span>${a.jadwal.data.imsak}</span>`),$("[data-name=subuh]").html(`<span>${a.jadwal.data.subuh}</span>`),$("[data-name=terbit]").html(`<span>${a.jadwal.data.terbit}</span>`),$("[data-name=dhuha]").html(`<span>${a.jadwal.data.dhuha}</span>`),$("[data-name=dzuhur]").html(`<span>${a.jadwal.data.dzuhur}</span>`),$("[data-name=ashar]").html(`<span>${a.jadwal.data.ashar}</span>`),$("[data-name=maghrib]").html(`<span>${a.jadwal.data.maghrib}</span>`),$("[data-name=isya]").html(`<span>${a.jadwal.data.isya}</span>`)},error:function(a){$(".box-shalat").html('<span class="small"><i class="fa fa-exclamation-triangle pr-1"></i> Gagal memuat</span>'),$(".box-shalat").removeClass("shimmer")}})}catch(a){console.log(a)}}});
			$(document).ready(function(){if($("#jadwal-shalat2").length){const b="https://api.banghasan.com/",t=`sholat/format/json/kota/kode/${KODE_KOTA}`,m=`sholat/format/json/jadwal/kota/${KODE_KOTA}/tanggal/${BESOK}`;try{$.ajax({url:b+m,type:"get",dataType:"json",crossDomain:!0,success:function(b){$(".shimmer").removeClass("shimmer"),$("[data-name=tanggal2]").html(`<span>${b.jadwal.data.tanggal}</span>`),$("[data-name=imsak2]").html(`<span>${b.jadwal.data.imsak}</span>`),$("[data-name=subuh2]").html(`<span>${b.jadwal.data.subuh}</span>`),$("[data-name=terbit2]").html(`<span>${b.jadwal.data.terbit}</span>`),$("[data-name=dhuha2]").html(`<span>${b.jadwal.data.dhuha}</span>`),$("[data-name=dzuhur2]").html(`<span>${b.jadwal.data.dzuhur}</span>`),$("[data-name=ashar2]").html(`<span>${b.jadwal.data.ashar}</span>`),$("[data-name=maghrib2]").html(`<span>${b.jadwal.data.maghrib}</span>`),$("[data-name=isya2]").html(`<span>${b.jadwal.data.isya}</span>`)},error:function(b){$(".box-shalat").html('<span class="small"><i class="fa fa-exclamation-triangle pr-1"></i> Gagal memuat</span>'),$(".box-shalat").removeClass("shimmer")}})}catch(b){console.log(b)}}});
			</script>

			<script>
				const KODE_KOTA = "<?= config_item('kode_kota') ?>";
				const TANGGAL = "<?= date('Y-m-d') ?>";
				const BESOK = "<?= date("Y-m-d", mktime(0,0,0,date("n"),date("j")+1,date("Y"))) ?>";
			</script>
			<div class="bottom-container">
				<div class="jadwal-shalat" id="jadwal-shalat" style="text-align:center;">
				<div class="container-custom">
					<div class="flexcenter"><h2>Jadwal Shalat di <?= ucwords($this->setting->sebutan_kabupaten) ?> <?= $header['nama_kabupaten'] ?></h2></div>
					<div class="margin-min10">
						<div class="column-6">
						<div class="pd-lr-10">
							<div class="box-jadwal flexcenter latar-jingga">
							<p>Imsak<br/><span class="big-jadwal" data-name="imsak"></span></p>
							</div>
						</div>
						</div>
						<div class="column-6">
						<div class="pd-lr-10">
							<div class="box-jadwal flexcenter latar-biru">
							<p>Subuh<br/><span class="big-jadwal" data-name="subuh"></span></p>
							</div>
						</div>
						</div>
						<div class="column-6">
						<div class="pd-lr-10">
							<div class="box-jadwal flexcenter latar-hijau">
							<p>Dzuhur<br/><span class="big-jadwal" data-name="dzuhur"></span></p>
							</div>
						</div>
						</div>
						<div class="column-6">
						<div class="pd-lr-10">
							<div class="box-jadwal flexcenter latar-ungu">
							<p>Ashar<br/><span class="big-jadwal" data-name="ashar"></span></p>
							</div>
						</div>
						</div>
						<div class="column-6">
						<div class="pd-lr-10">
							<div class="box-jadwal flexcenter latar-toska">
							<p>Maghrib<br/><span class="big-jadwal" data-name="maghrib"></span></p>
							</div>
						</div>
						</div>
						<div class="column-6">
						<div class="pd-lr-10">
							<div class="box-jadwal flexcenter latar-merah">
							<p>Isya<br/><span class="big-jadwal" data-name="isya"></span></p>
						</div>
						</div>
						</div>
					</div>
				</div>
				</div>
				<div class="mandirifooter">
				<a href="https://github.com/OpenSID/OpenSID" class="content-color-secondary" rel="noopener noreferrer" target="_blank">OpenSID <?= AmbilVersi() ?></a>
				<?php if (! $cek_anjungan) : ?>
				<br/>
				IP Address: <?= $this->input->ip_address() ?>
				<?php else : ?>
				IP Address : <?= $cek_anjungan['ip_address'] ?>
				<br />Mac Address : <?= $cek_anjungan['mac_address'] ?>
				<br />Anjungan Mandiri
				<?= jecho($cek_anjungan['keyboard'] == 1, true, ' | Virtual Keyboard : Aktif') ?>
				<?php endif; ?>
				</div>
			</div>

		</div>
	</div>
	
		
	<!-- jQuery 3 -->
	<script src="<?= asset('bootstrap/js/jquery.min.js') ?>"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="<?= asset('bootstrap/js/bootstrap.min.js') ?>"></script>
	<!-- bootstrap Date picker -->
	<script src="<?= asset('bootstrap/js/bootstrap-datepicker.min.js') ?>"></script>
	<script src="<?= asset('bootstrap/js/bootstrap-datepicker.id.min.js') ?>"></script>
	<!-- SlimScroll -->
	<script src="<?= asset('bootstrap/js/jquery.slimscroll.min.js') ?>"></script>
	<!-- FastClick -->
	<script src="<?= asset('bootstrap/js/fastclick.js') ?>"></script>
	<!-- AdminLTE App -->
	<script src="<?= asset('js/adminlte.min.js') ?>"></script>
	<!-- Validasi -->
	<script src="<?= asset('js/jquery.validate.min.js') ?>"></script>
	<script src="<?= asset('js/validasi.js') ?>"></script>
	<script src="<?= asset('js/localization/messages_id.js') ?>"></script>

	<!-- Form Wizard - jquery.smartWizard -->
	<script src="https://cdn.jsdelivr.net/npm/smartwizard@5/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script>

	<?php if ($cek_anjungan) : ?>
		<!-- keyboard widget css & script -->
		<script src="<?= asset('js/jquery.keyboard.min.js') ?>"></script>
		<script src="<?= asset('js/jquery.mousewheel.min.js') ?>"></script>
		<script src="<?= asset('js/jquery.keyboard.extension-all.min.js') ?>"></script>
		<script src="<?= asset('front/js/mandiri-keyboard.js') ?>"></script>
	<?php endif; ?>
			
	<script type="text/javascript">
		$('document').ready(function() {

			var ektp = '<?= $this->session->login_ektp ?>';
			var anjungan = '<?= $cek_anjungan ?>';

			if (ektp) {
				if (anjungan) {
					$('#tag').focus();
				} else {
					$('#pin').focus();
				}
			}

			var pass = $("#pin");
			$('#checkbox').click(function() {
				if (pass.attr('type') === "password") {
					pass.attr('type', 'text');
				} else {
					pass.attr('type', 'password')
				}
			});

			if ($('#countdown').length) {
				start_countdown();
			}

			window.setTimeout(function() {
				$("#notif").fadeTo(500, 0).slideUp(500, function() {
					$(this).remove();
				});
			}, 5000);

			var videona = document.getElementById("videona");
			videona.pause();
			var IDLE_TIMEOUT = <?= $this->setting->tampilan_anjungan_waktu; ?>; //seconds
			var _idleSecondsCounter = 0;
			document.onclick = function() {
				_idleSecondsCounter = 0;
			};
			document.onmousemove = function() {
				_idleSecondsCounter = 0;
			};
			document.onkeypress = function() {
				_idleSecondsCounter = 0;
			};
			window.setInterval(CheckIdleTime, 500);

			function CheckIdleTime() {
				_idleSecondsCounter++;
				var video = document.getElementById("videov");
				var slider = document.getElementById("sliderv");
				var tampil_anjungan = '<?= $this->setting->tampilan_anjungan; ?>';
				var tampil_anjungan_video = '<?= $this->setting->tampilan_anjungan_video; ?>';
				var tampil_anjungan_slider = '<?= $this->setting->tampilan_anjungan_slider; ?>';
				if (_idleSecondsCounter >= IDLE_TIMEOUT) {
					if (tampil_anjungan == 2 && tampil_anjungan_video) {
						videona.play();
						video.style.display = "block";
					} else if (tampil_anjungan == 1 && tampil_anjungan_slider) {
						slider.style.display = "block";
					}
				} else {
					if (tampil_anjungan == 2 && tampil_anjungan_video) {
						videona.pause();
						video.style.display = "none";
					} else if (tampil_anjungan == 1 && tampil_anjungan_slider) {
						slider.style.display = "none";
					}
				}
			}
		});

		function start_countdown() {
			var times = eval(<?= json_encode($this->session->mandiri_timeout) ?>) - eval(<?= json_encode(time()) ?>);
			var menit = Math.floor(times / 60);
			var detik = times % 60;

			timer = setInterval(function() {
				detik--;
				if (detik <= 0 && menit >= 1) {
					detik = 60;
					menit--;
				}
				if (menit <= 0 && detik <= 0) {
					clearInterval(timer);
					location.reload();
				} else {
					document.getElementById("countdown").innerHTML = "<b>Gagal 3 kali silakan coba kembali dalam " + menit + " MENIT " + detik + " DETIK </b>";
				}
			}, 500);
		}

		//Date picker
		$('#daftar_tgl_lahir').datepicker({
			autoclose: true
		})

		function show(elem) {
			if ($(elem).hasClass('fa-eye')) {
				$(".pin").attr('type', 'password');
				$(".fa-eye").addClass('fa-eye-slash');
				$(".fa-eye").removeClass('fa-eye');
			} else {
				$(".pin").attr('type', 'text');
				$(".fa-eye-slash").addClass('fa-eye');
				$(".fa-eye-slash").removeClass('fa-eye-slash');
			}
		}

		<?php if ($this->session->flashdata('info_pendaftaran')) : ?>
			$(window).on('load', function() {
				$('#informasi').modal('show');
			});
		<?php endif; ?>
		<?php if ($this->session->flashdata('daftar_notif_telegram')) : ?>
			$(window).on('load', function() {
				$('#notif_telegram').modal('show');
			});
		<?php endif; ?>
	</script>

</body>
</html>