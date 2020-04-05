<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title>
Log In
</title>
</head>
<body>
<div id="login">
<h2>Log in!</h2>
<form action="" method="post" class="form-example">
  <div>
    <input class="field"type="email" name="email" placeholder="email" required>
  </div>
  <div>
    <input class="field" type="password" name="password" placeholder="password" required>
  </div>
  <div>
    <input type="submit" value="Log In">
  </div>
</form>
<p>New user? <a href="signup.php"><span>Sign up!</span></a></p>


<?php

if ($_SERVER["REQUEST_METHOD"] === "POST")
{
	$email = $_POST["email"];
	$pass = $_POST["password"];
	
	$all_mails = file("emails.txt", FILE_IGNORE_NEW_LINES);
	$passwords = file("passwords.txt", FILE_IGNORE_NEW_LINES);
	
	$mails_and_pwds = array_combine($all_mails, $passwords);
	
	if (key_exists($email, $mails_and_pwds) && $mails_and_pwds[$email] === $pass)
	{
		echo header("refresh:0;url=welcome.php");
	}
	else echo "<p id=\"message\">Wrong username or password!</p>";
	
}

?>
<p id="message"><?= $message?></p>
</div>
</body>
</html>