<!DOCTYPE html>
<html>
<head>
    <title>Form Input</title>
</head>
<body>
<h2>Form Input</h2>
<form method="post">
    <label>Jenenge nomone sopo: </label>
    <input type="text" name="nama">
    <input type="submit" value="Kirim">
</form>

<?php
echo 'Selamat Datang ' . $_POST['nama'];
?>
</body>
</html>
