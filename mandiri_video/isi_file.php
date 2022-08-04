
	<!-- Buka file : donjo-app/views/layanan_mandiri/masuk.php -->
	
	<!-- Disarankan gandakan terlebih dahulu file tersebut sebelum di edit, rename misal dengan nama : masuk_default.php  -->



	<!-- Tambahkan script ini kedalam <head>....</head> -->
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>desa/mandiri_video/mandiri_video.css">
	
	
	<!-- Pada bagian ini... -->
	<?php if ($latar_login): ?>
		<style type="text/css">
			body.login-page {
				background: url('<?= base_url($latar_login) ?>');
				background-size:cover;<!-- tambahkan style ini agar gambar latar login berukuran full -->
			}
		</style>
	<?php endif; ?>




	<!-- Hapus semua class didalam <body>....</body> ganti dengan semua class dibawah -->
	<div class="video-internal">
		<video loop muted autoplay poster="poster.jpg" class="video-internal-bg">
			<source src="<?= base_url()?>desa/mandiri_video/video.mp4" type="video/mp4"><!-- Ganti nama video sesuai nama video yang anda masukkan di folder mandiri_video -->
		</video>
	</div>
	<div class="login_mandiri_head">
		<div class="mandiri-title">
		<div class="mandiri-title-backg"><h2>LAYANAN MANDIRI</h2></div>
			<h1>LAYANAN MANDIRI</h1>
		</div>
	</div>

	<div class="login-mandiri-box">
		<div class="identity">
			<div class="flexcenter">
				<img src="<?= gambar_desa($header['logo']); ?>" alt="<?=$header['nama_desa']?>" />
				<div class="identity-name"><?= ucwords($this->setting->sebutan_desa); ?><br/><?= ucwords(($header['nama_desa']) ? ' ' . $header['nama_desa'] : ''); ?></div>
			</div>
			<div class="identity-address"><?=$header['alamat_kantor']?><br/><?=ucwords($this->setting->sebutan_kecamatan)?> <?=$header['nama_kecamatan']?>, <?=ucwords($this->setting->sebutan_kabupaten)?> <?=$header['nama_kabupaten']?>, <?=$header['kode_pos']?></div>
		</div>
		
		<?php if ($this->session->mandiri_wait == 1): ?>
			<div class="limit-fail">
				<div class="limit-fail-inner">
					<img src="<?= base_url()?>desa/mandiri_video/wait.png"/>
					<p id="countdown"></p>
					<audio autoplay><!-- Sound effect saat NIK / PIN salah -->
						<source src="<?= base_url()?>desa/mandiri_video/effecterror.mp3"></source>
					</audio>
				</div>
			</div>
		<?php else: ?>
			<?php $data = $this->session->flashdata('notif'); ?>
			<?php if ($this->session->mandiri_try < 4): ?>
				<div class="login-fail flexcenter" id="notif">
					<div class="login-fail-inner">
						<img src="<?= base_url()?>desa/mandiri_video/fail.svg"/>
						<p>NIK atau PIN salah.<br/>Kesempatan mencoba <?= ($this->session->mandiri_try - 1); ?> kali lagi.</p>
					</div>
					<audio autoplay><!-- Sound effect saat NIK / PIN salah 3 kali -->
						<source src="<?= base_url()?>desa/mandiri_video/effectwrong.mp3"></source>
					</audio>
				</div>
			<?php endif; ?>
			<form id="validasi" action="<?= $form_action; ?>" method="post">
				<div class="box-form">
				<div class="margin-min5 flexcenter">
					<div class="box-form-left">
					<div class="padding-lr-5">
					<div class="form-group">
					<div class="dark-blue">
						<input type="text" class="form-control required <?= jecho($cek_anjungan['keyboard'] == 1, TRUE, 'kbvnumber'); ?>" name="nik" placeholder=" NIK">
					</div>
					</div>
					</div>
					</div>
					<div class="box-form-right">
					<div class="padding-lr-5">
					<div class="form-group">
						<div class="dark-blue">
						<input type="password" class="form-control required <?= jecho($cek_anjungan['keyboard'] == 1, TRUE, 'kbvnumber'); ?>" name="pin" placeholder="PIN" id="pin">
						</div>
					</div>
					</div>
					</div>
					<div class="password-view">
					<div class="padding-lr-5">
					<div class="form-group">
						<div class="dark-viola">
						<div class="form-control flexleft">
							<input type="checkbox" id="checkbox">
							<label for="checkbox" class="checkbox">
								<div class="checkbox__inner">
								<div class="green__ball"></div>
								</div>
							</label>
							<div class="checkbox__text">
								<span>PIN </span>
								<div class="checkbox__text--options"><span class="off">disembunyikan</span><span class="on">ditampilkan</span></div>
							</div>
						</div>
						</div>
					</div>
					</div>
					</div>
					<div class="enter-login">
					<div class="padding-lr-5">
					<div class="form-group">
					<div class="dark-green">
						<button type="submit" class="form-control enter-login-inner">MASUK</button>
					</div>
					</div>
					</div>
					</div>
				</div>
				</div>				
			</form>
			<div class="pin-info flexcenter"><img src="<?= base_url()?>desa/mandiri_video/info.svg"/>Silakan datang atau hubungi operator <?= $this->setting->sebutan_desa; ?> untuk mendapatkan kode PIN anda.</div>
		<?php endif; ?>
		<div class="mandiri-copyright">IP Address :
			<?php if ( ! $cek_anjungan): ?>
				<?= $this->input->ip_address(); ?>
			<?php else: ?>
				<?= $cek_anjungan['ip_address'] . "<br/>Anjungan Mandiri" ?>
				<?= jecho($cek_anjungan['keyboard'] == 1, TRUE, ' | Virtual Keyboard : Aktif'); ?>
			<?php endif; ?> | <a href="https://github.com/OpenSID/OpenSID" target="_blank" rel="noreferrer">OpenSID <?= AmbilVersi() ?></a>
		</div>
		
	</div>



	
	<!-- Jika ingin tambahkan script ini di bawah class modal-content pada file donjo-app/views/layanan_mandiri/notif.php -->
	<audio autoplay>
		<source src="<?= base_url()?>desa/mandiri_video/effectsuccess.mp3"></source>
	</audio>