<?php

include 'db.php';

$message="";

if(isset($_POST['register']))
{

$username=$_POST['username'];

$password=$_POST['password'];

$check=

mysqli_query(

$conn,

"SELECT *
FROM users
WHERE username='$username'"

);

if(mysqli_num_rows($check)>0)
{

$message=
"Username already exists";

}

else
{

mysqli_query(

$conn,

"INSERT INTO users
(
username,
password
)

VALUES

(
'$username',
'$password'
)"

);

if(strlen($password)<8)
{

$insert=

mysqli_query(

$conn,

"INSERT INTO incidents
(
title,
severity,
status,
description,
source,
affected_user
)

VALUES
(
'Weak Password Vulnerability',

'Low',

'Open',

'Password length below 8 detected during registration.',

'Registration System',

'$username'
)"

);

if($insert)
{

$message=

"Account created. Weak password detected.";

}

else
{

$message=

"Incident insert failed: "

.

mysqli_error($conn);

}

}

header("Location: login.php");

exit();

}

}

?>

<!DOCTYPE html>

<html>

<head>

<title>Register</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="login-box">

<h1>Create Account</h1>

<p>Create account before login</p>

<form method="POST">

<input
type="text"
name="username"
placeholder="Username"
required>

<input
type="password"
name="password"
placeholder="Password"
required>

<button
type="submit"
name="register">
Register
</button>
</form>

<br>
<?php
echo $message;
?>
<br>

<a href="login.php">
Already have account?
Login
</a>
</div>
</body>
</html>