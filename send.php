<?php
$barang  = $_POST['barang'];
$harga   = $_POST['harga'];
$pembeli = $_POST['pembeli'];
$metode  = $_POST['metode'];

$namaFile = $_FILES['bukti']['name'];
$tmp = $_FILES['bukti']['tmp_name'];

$folder = "bukti/";
if(!is_dir($folder)) mkdir($folder);

$path = $folder.time()."_".$namaFile;
move_uploaded_file($tmp,$path);

$admin = "6283183737844"; // GANTI NOMOR ADMIN

$pesan = urlencode(
"🧾 *PEMBAYARAN BARU* 💸\n\n".
"📦 *Nama Barang :* $barang\n".
"💸 *Harga Barang :* $harga\n".
"👤 *Nama Seller :* $pembeli\n".
"💳 *Metode Pembayaran :* $metode\n\n".
"📁 *Bukti Pembayaran* : ".((isset($_SERVER['HTTPS'])?"https":"http")."://".$_SERVER['HTTP_HOST']."/$path")
);

header("Location: https://wa.me/$admin?text=$pesan");