<?php

session_start();

include 'db.php';

$message="";

if(isset($_POST['login']))
{

$username=$_POST['username'];

$password=$_POST['password'];

/* Check username */

$user=

mysqli_query(

$conn,

"SELECT *FROM users
WHERE username='$username'");

if(mysqli_num_rows($user)==0)
{
$message=
"Username not found. Please register first.";
}

else
{

$result=

mysqli_query(

$conn,

"SELECT *FROM users
WHERE username='$username'
AND password='$password'");

if(mysqli_num_rows($result)>0)
{

$_SESSION['user']=$username;

header("Location: dashboard.php");

exit();

}

else
{

mysqli_query(

$conn,

"INSERT INTO login_attempts
(username,
success)

VALUES
('$username',0)");

$count=

mysqli_query(

$conn,

"SELECT COUNT(*) total
FROM login_attempts
WHERE username='$username'
AND success=0");

$data=
mysqli_fetch_assoc($count);

if($data['total']>=3)
{

$check=

mysqli_query(

$conn,

"SELECT *FROM incidents
WHERE title='Brute Force Login Attempt'
AND affected_user='$username'
AND status='Open'");

if(mysqli_num_rows($check)==0)
{

mysqli_query(

$conn,

"INSERT INTO incidents
(
title,
severity,
description,
source,
affected_user
)

VALUES
(
'Brute Force Login Attempt',
'Medium',
'Three failed login attempts detected.',
'Authentication System',
'$username')");
}
}
$message=
"Wrong password. Try again.";
}
}
}
?>

<!DOCTYPE html>

<html>

<head>

<title>CyberShield SOC Portal</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="login-box">

<h1>CyberShield SOC Portal</h1>

<p>
Threat Detection,
Incident Investigation
and Defensive Response System
</p>

<form method="POST">

<input
type="text"
name="username"
placeholder="Enter Username"
required>

<input
type="password"
name="password"
placeholder="Enter Password"
required>

<button type="submit" name="login">
Login
</button>
</form>
<br>

<p>
Don't have account?
</p>

<a href="register.php">
Register
</a>
<br><br>
<?php
echo $message;
?>
</div>
</body>
</html>