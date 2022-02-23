<?php
//library phpqrcode
include "../lib/phpqrcode/qrlib.php";

//direktory tempat menyimpan hasil generate qrcode jika folder belum dibuat maka secara otomatis akan membuat terlebih dahulu
$tempdir = "../temp/"; 
if (!file_exists($tempdir))
    mkdir($tempdir);

?>
<html>
<head>
    <meta http-equiv="Content-Type" content="isi_teks/html; charset=utf-8" />    
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link rel="icon" href="dk.png">
    <title>QRCode Generator</title>
</head>
<body>
  <?php
    //Isi dari QRCode Saat discan
    $first_name = "Dewan";
    $last_name = "Komputer";
    $phone_celular = "08996668787";
    $phone_work = "08996668788";
    $organization = "PT. Dewan Komputer";
    $position = "Job Title";
    $phone_home = "08996668789";
    $email = "contact@dewankomputer.com";
    $sortName = $last_name.";".$first_name;
    $name = $first_name." ".$last_name;

    //Alamat
    $label     = "Kantor Dewan Komputer";
    $pobox     = "51234";
    $ext       = "123";
    $street    = "Jalan Cinta";
    $town      = "Jakarta";
    $post_code = "325325";
    $country   = "Indonesia";

    //Isi Teks dalam QRCode
    $isi_teks  = 'BEGIN:VCARD'."\n";
    $isi_teks .= 'VERSION:4.0'."\n";
    $isi_teks .= 'N:'.$sortName."\n";
    $isi_teks .= 'FN:'.$name."\n";
    $isi_teks .= 'ORG:'.$organization."\n";
    $isi_teks .= 'TITLE:'.$position."\n";
    $isi_teks .= 'TEL;TYPE=work,voice;VALUE=uri:tel:'.$phone_work."\n";
    $isi_teks .= 'TEL;TYPE=home,voice;VALUE=uri:tel:'.$phone_home."\n";
    $isi_teks .= 'TEL;TYPE=cell,voice;VALUE=uri:tel:'.$phone_celular."\n";

    $isi_teks .= 'ADR;TYPE=HOME;'.
        'LABEL="'.$label.'":'
        .$pobox.';'
        .$ext.';'
        .$street.';'
        .$town.';'
        .$post_code.';'
        .$country
    ."\n";
    $isi_teks .= 'EMAIL:'.$email."\n";
    $isi_teks .= 'END:VCARD'; 

    //Nama file yang akan disimpan pada folder temp 
    $namafile = "dewan-komputer.png";
    //Kualitas dari QRCode 
    $quality = 'L'; 
    //Ukuran besar QRCode
    $ukuran = 8; 
    $padding = 0; 
    QRCode::png($isi_teks,$tempdir.$namafile,$quality,$ukuran,$padding);
  ?>
  <div align="center" style="margin-top: 50px;">
    <h2>Cara Membuat QRCode Generator Kontak/VCard Menggunakan PHP </h2>
    <img src="../temp/<?php echo $namafile; ?>" style="margin: 50px; width: 250px;">
    <p>www.dewankomputer.com</p>
    <a href="https://dewankomputer.com/2019/01/15/cara-membuat-qrcode-generator-menggunakan-php-part-10-qrcode-vcard-kontak-2/"><p><< Kembali ke Tutorial</p></a>
  </div>
</body>
</html>