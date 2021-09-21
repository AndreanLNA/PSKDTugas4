<?php

// mendeklarasikan variables
$pswd = "";
$code = "";
$error = "";
$valid = true;
$color = "#FF0000";

// jika form telah submit
if ($_SERVER['REQUEST_METHOD'] == "POST")
{
	// menghubungkan dengan vigenere
	require_once('vigenere.php');
	
	//  memberikan variables
	$pswd = $_POST['pswd'];
	$code = $_POST['code'];
	
	// mengecek pasword
	if (empty($_POST['pswd']))
	{
		$error = "Please enter a password!";
		$valid = false;
	}
	
	// mengecek text
	else if (empty($_POST['code']))
	{
		$error = "Masukkan sebuah text";
		$valid = false;
	}
	
	// mengecek apakah pasword sudah huruf alpabet
	else if (isset($_POST['pswd']))
	{
		if (!ctype_alpha($_POST['pswd']))
		{
			$error = "Pasword hanya dapat karakter alpabet";
			$valid = false;
		}
	}
	
	// bila input valid
	if ($valid)
	{
		// bila tombol enkripsi telah ditekan
		if (isset($_POST['encrypt']))
		{
			$code = encrypt($pswd, $code);
			$error = "Enkripsi sukses";
			$color = "#526F35";
		}
			
		// bila tombol deskripsi telah ditekan
		if (isset($_POST['decrypt']))
		{
			$code = decrypt($pswd, $code);
			$error = "Deskripsi sukses";
			$color = "#526F35";
		}
	}
}


// karena dibawah tidak dapat diberi ketikan maka akan saya ketik disini,di bagian bawah mencakup judul,program penghubung dengan style.css ,pemberian backgroud pembuatan tombol untuk enkripsi,deskripsi,dan hapus.Lalu ada juga warna backgroud dan warna tombol


?>

<html>
	<head> 
		<title>ENKRIPSI & DESKRIPSI</title>
		<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
		<link rel="stylesheet" type="text/css" href="style.css">
		<script type="text/javascript" src="Script.js"></script>
	</head>
	<body>
	<style>
		body{
			background-color: magenta; 
		}
	</style>
		<br><br><br>
		<form action="index.php" method="post">
			<table cellpadding="5" align="center" cellpadding="2" border="7">
				<tr>
					<td align="center">Password: <input type="text" name="pswd" id="pass" value="<?php echo htmlspecialchars($pswd); ?>" /></td>
				</tr>
				<tr>
					<td align="center"><textarea id="box" name="code"><?php echo htmlspecialchars($code); ?></textarea></td>
				</tr>
				<tr>
					<style>
				input{
					background-color: pink; 
				}
					</style>
					<td><input type="submit" name="encrypt" class="button" value="Enkripsikan" onclick="validate(1)" /></td>
				</tr>
				<tr>
					<td><input type="submit" name="decrypt" class="button" value="Deskripsikan" onclick="validate(2)" /></td>
				</tr>
				<tr>
					<td><input type="submit" name="clear" class="button" value="Bersihkan" onclick="validate(3)" /></td>
				</tr>
				<tr>
					<td><center><div style="color: <?php echo htmlspecialchars($color) ?>"><?php echo htmlspecialchars($error) ?></div></center></td>
				</tr>
			</table>
		</form>
	</body>
</html>