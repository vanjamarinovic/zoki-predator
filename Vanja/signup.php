<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title>
Sign Up
</title>
</head>
<body>
<div id="login">
<h2>Sign up!</h2>
<form action="" method="post">
  <div>
    <input class="field" type="email" name="email" placeholder="email" required>
  </div>
  <div>
    <input class="field" type="password" name="password" placeholder="password" required>
  </div>
  <div>
    <input type="submit" value="Sign Up">
  </div>
</form>


<?php

if ($_SERVER["REQUEST_METHOD"] === "POST")
{
	$email = $_POST["email"];
	$pass = $_POST["password"];
	
	
	$all_mails = file("emails.txt", FILE_IGNORE_NEW_LINES);
	if (!in_array($email, $all_mails))
	{
		$fh = fopen("emails.txt", "a+");
		fwrite($fh, $email . "\r\n");
		fclose($fh);
		$fh = fopen("passwords.txt", "a+");
		fwrite($fh, $pass . "\r\n");
		fclose($fh);
	
		echo "<p>Sign up successfull! Redirecting to login page...</p>";
		header( "refresh:3;url=login.php" );
	}
	else {
		echo "<p id=\"message\">Mail already exists!</p>";
	}
}

?>

</div>
</body>
</html>