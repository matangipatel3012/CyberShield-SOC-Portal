<?php

session_start();

include 'db.php';

if(!isset($_SESSION['user']))
{
    header("Location: login.php");
    exit();
}

$id=$_GET['id'];

if(isset($_POST['resolve']))
{

mysqli_query(

$conn,

"UPDATE incidents

SET status='Resolved'

WHERE id='$id'"

);

header("Location: dashboard.php");

exit();

}

?>

<!DOCTYPE html>

<html>
<head>

<title>
Investigation
</title>

<link
rel="stylesheet"
href="style.css">

</head>

<body>

<div class="incident-page">

<div class="incident-card">

<h2>
SOC Investigation
</h2>

<hr>

<h3>
Investigation Steps
</h3>

<ul>

<li>Collect incident evidence</li>

<li>Analyze user activity and authentication logs.</li>

<li>Identify the source of suspicious activity.</li>

<li>Contain the affected system.</li>

<li>Monitor for further malicious attempts.</li>

<li>Verify that the threat has been mitigated.</li>

</ul>

<div class="investigation-buttons">

<form method="POST">

<button
type="submit"
name="resolve">
Mark Resolved
</button>
</form>

<a href="dashboard.php">

<button
type="button">
Back To Dashboard
</button>
</a>

</div>

</div>

</div>
</body>
</html>