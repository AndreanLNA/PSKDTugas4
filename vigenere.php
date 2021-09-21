<?php

// pembuatan fungsi enkripsi
function encrypt($pswd, $text)
{
	// mengubah kuncii ke lowercase agar simpel
	$pswd = strtolower($pswd);
	
	// mendeklarasikan variables
	$code = "";
	$ki = 0;
	$kl = strlen($pswd);
	$length = strlen($text);
	
	for ($i = 0; $i < $length; $i++)
	{
		// jika merupakan karakter alpabet maka akan di enkripsi
		if (ctype_alpha($text[$i]))
		{
			// uppercase
			if (ctype_upper($text[$i]))
			{
				$text[$i] = chr(((ord($pswd[$ki]) - ord("a") + ord($text[$i]) - ord("A")) % 26) + ord("A"));
			}
			
			// lowercase
			else
			{
				$text[$i] = chr(((ord($pswd[$ki]) - ord("a") + ord($text[$i]) - ord("a")) % 26) + ord("a"));
			}
			
			// update
			$ki++;
			if ($ki >= $kl)
			{
				$ki = 0;
			}
		}
	}
	
	// return
	return $text;
}


// membuat fungsi untuk menghapus text
function clear($pswd, $text)
{
session_start();
session_unset();
session_destroy();
header("location: index.php");
}

// membuat fungsi untuk mendeskripsikan text
function decrypt($pswd, $text)
{
	// merubah text ke lowercase agar simpel
	$pswd = strtolower($pswd);
	
	// mendeklarasikan variables
	$code = "";
	$ki = 0;
	$kl = strlen($pswd);
	$length = strlen($text);
	
	for ($i = 0; $i < $length; $i++)
	{
		// jika merupakan karakter alpabet maka akan di enkripsi
		if (ctype_alpha($text[$i]))
		{
			// uppercase
			if (ctype_upper($text[$i]))
			{
				$x = (ord($text[$i]) - ord("A")) - (ord($pswd[$ki]) - ord("a"));
				
				if ($x < 0)
				{
					$x += 26;
				}
				
				$x = $x + ord("A");
				
				$text[$i] = chr($x);
			}
			
			// lowercase
			else
			{
				$x = (ord($text[$i]) - ord("a")) - (ord($pswd[$ki]) - ord("a"));
				
				if ($x < 0)
				{
					$x += 26;
				}
				
				$x = $x + ord("a");
				
				$text[$i] = chr($x);
			}
			
			// update
			$ki++;
			if ($ki >= $kl)
			{
				$ki = 0;
			}
		}
	}
	
	// return 
	return $text;
}

?>