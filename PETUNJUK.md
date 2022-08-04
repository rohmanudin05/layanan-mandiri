Petunjuk :

1. Back up terlebih dahulu file : donjo-app/views/fmandiri/masuk.php

2. Kemudian upload file masuk.php yang ada di folder mandiri_video ke lokasi tadi (donjo-app/views/fmandiri)

3. Copy dan pastekan file : layanan_mandiri.css (yang tersedia dalam paket ini - folder mandiri_video) kedalam folder desa

4. Masukkan file video dengan format mp4 anda ke dalam folder : desa

5. Rename nama video dengan : video.mp4

6. Jika tidak ada video, otomatis akan diganti dengan gambar latar belakang Layanan Mandiri

7. Untuk jadwal Shalat silahkan masukkan kode dibawah ke dalam file  : desa/config/config.php dibaris paling bawah
   $config['kode_kota'] = 632;

8. Ganti kode_kota (632) dengan kode kota anda. Untuk angka kode_kota anda silahkan cari di link dibawah ini :
   https://api.banghasan.com/sholat/format/json/kota
