<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikat</title>
    <link rel="stylesheet" href="{{ asset('sertifikat/styles.css') }}">
</head>
<body>
    
<?php 
  function tanggal($format,$nilai="now"){
  $en=array("Sun","Mon","Tue","Wed","Thu","Fri","Sat","Jan","Feb",
  "Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
  $id=array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu",
  "Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September",
  "Oktober","November","Desember");
  return str_replace($en,$id,date($format,strtotime($nilai)));
  }

  $tgl_sk = $result[0]->tgl_sk;

  $tanggal_sk = strtotime($tgl_sk);
  $tanggal_sk = date('d-m-Y', $tanggal_sk);
  $tanggal_sk = tanggal("j M Y",$tanggal_sk);

  $tgl_sk_akhir = $result[0]->tgl_sk_akhir;

  $tanggal_sk_akhir = strtotime($tgl_sk_akhir);
  $tanggal_sk_akhir = date('d-m-Y', $tanggal_sk_akhir);
  $tanggal_sk_akhir = tanggal("j M Y",$tanggal_sk_akhir);

?>
    <div class="certificate" id="certificate">
        <div class="overlay"></div>
        <div class="content" id="certificate-content">
        </div>
        <div class="footer">
            <div class="qrcode" id="qrcode-container">
            </div>
            <div class="date-name" id="date-name">
            </div>
        </div>
    </div>
    <script>
        let _content = `
        <div class="content">
            <div class="description">
                <h1>SERTIFIKAT AKREDITASI</h1>
                <p>PERKUMPULAN LEMBAGA AKREDITASI MANDIRI<BR>PENDIDIKAN TINGGI KESEHATAN INDONESIA</p>
            </div>
              <div class="mid">
                <p>Berdasarkan Keputusan LAM-PTKes</p>
                <p>{{ $result[0]->no_sk }}</p>
                <p>dan</p>
                <p>Berdasarkan Keputusan Menteri Pendidikan dan Kebudayaan Republik Indonesia</p>
                <p>No. 394/M/2020</p>
                <p>Menyatakan:</p>
            </div>
            <div class="midi">
                <h3>{{ $jenjang }} {{ $nama_ps }}</h3>
                <h3>{!! strtoupper($nama_pt ) !!}</h3>
                <h2>Terakreditasi {{ $result[0]->rank_prodi }}</h2>
                <p class="duedate">Sertifikat akreditasi berlaku sampai dengan tanggal <?php echo $tanggal_sk_akhir?></p>
            </div>
        </div>
    `;
        let _dateName = `<div class="date-name">
                            <p>Jakarta, <?php echo $tanggal_sk?></p>
                            <p class="name">Prof.dr.Usman Chatib Warsa, Sp.,MK., PhD</p>
                            <p>Ketua</p>
                        </div>`;
    </script>
    <script src="{{ asset('sertifikat/script.js') }}"></script>
</body>
</html>
