<?php
$barang = $_GET['barang'] ?? '';
$harga  = $_GET['harga'] ?? ''; // ⬅ tambahan
?>
<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Pembayaran</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
.card{
    border-radius:15px;
}
input, select{
    border-radius:10px !important;
}
.btn{
    border-radius:50px;
}
</style>

<script>
function showPayment(){
    let metode = document.getElementById("metode").value;
    document.getElementById("detail").style.display = "block";
    document.getElementById("rekening").value = metode;
    
    let nomor = {
        "DANA":"083183737844",
        "OVO":"083183737844",
        "GOPAY":"083183737844",
        "MANDIRI":"4098730122369892",
        "QRIS":"https://drive.google.com/file/d/19HMQMTpR68QaBs1mif5y9UaqQ2WxphZl/view"
    };

    document.getElementById("nomor").value = nomor[metode];
}

function copyText(){
    let copy = document.getElementById("nomor");
    copy.select();
    document.execCommand("copy");
    alert("Nomor / Link berhasil disalin");
}
</script>

</head>
<body class="bg-light">

<div class="container mt-4 mb-5">
<div class="card shadow-sm">
<div class="card-body">

<h5 class="text-center mb-4">METODE PEMBAYARAN</h5>

<form action="send.php" method="post" enctype="multipart/form-data">

<div class="mb-3">
<label>Nama Barang :</label>
<input type="text" class="form-control" name="barang" value="<?= htmlspecialchars($barang) ?>" readonly>
</div>

<!-- HARGA BARANG (BARU) -->
<div class="mb-3">
<label>Harga Barang :</label>
<input type="text" class="form-control" name="harga" value="<?= htmlspecialchars($harga) ?>" readonly> 
</div>


<div class="mb-3">
<label>Nama Pembeli :</label>
<input type="text" class="form-control" name="pembeli" required>
</div>

<div class="mb-3">
<label>Pilih Metode Pembayaran :</label>
<select class="form-select" id="metode" onchange="showPayment()" required>
<option value="">-- Pilih --</option>
<option value="QRIS">QRIS</option>
<option value="DANA">DANA</option>
<option value="OVO">OVO</option>
<option value="GOPAY">GOPAY</option>
<option value="MANDIRI">MANDIRI</option>
</select>
</div>

<div id="detail" style="display:none">
<div class="mb-3">
<label>Jenis Pembayaran :</label>
<input type="text" class="form-control" id="rekening" name="metode" readonly>
</div>

<div class="mb-3">
<label>Nomor / Link Pembayaran :</label>
<div class="input-group">
<input type="text" class="form-control" id="nomor" readonly>
<button type="button" class="btn btn-outline-primary" onclick="copyText()">SALIN</button>
</div>
</div>
</div>

<div class="mb-3">
<label>Upload Bukti Pembayaran :</label>
<input type="file" class="form-control" name="bukti" required>
</div>

<button class="btn btn-success w-100">KIRIM KE ADMIN</button>

</form>

</div>
</div>
</div>

</body>
</html>