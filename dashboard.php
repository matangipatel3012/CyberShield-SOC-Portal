<?php

session_start();

include 'db.php';

if(!isset($_SESSION['user']))
{
header("Location: login.php");
exit();
}

$total=
mysqli_fetch_assoc(
mysqli_query(
$conn,
"SELECT COUNT(*) total
FROM incidents
WHERE affected_user='".$_SESSION['user']."'"));

$open=
mysqli_fetch_assoc(
mysqli_query(
$conn,
"SELECT COUNT(*) total
FROM incidents
WHERE status='Open'
AND affected_user='".$_SESSION['user']."'"));

$result=mysqli_query(
$conn,
"SELECT *FROM incidents
WHERE affected_user='".$_SESSION['user']."'

ORDER BY created_at DESC");
?>

<!DOCTYPE html>

<html>

<head>

<title>
CyberShield SOC Dashboard
</title>

<link
rel="stylesheet"
href="style.css">

</head>

<body>

<div class="container">

<h1>
CyberShield SOC Portal
</h1>

<h3>
Welcome,
<?php
echo $_SESSION['user'];
?>
</h3>

<div class="cards">
<div class="card">
<h2>
<?php
echo $total['total'];
?>
</h2>
<p>
Total Incidents
</p>
</div>

<div class="card">
<h2>
<?php
echo $open['total'];
?>
</h2>
<p>
Open Incidents
</p>
</div>

</div>

<h2>
Recent Incidents
</h2>

<table>

<tr>

<th>ID</th>
<th>Title</th>
<th>User</th>
<th>Severity</th>
<th>Status</th>
<th>Source</th>
<th>Detected Time</th>

</tr>

<?php
while($row=mysqli_fetch_assoc($result))
{
?>
<tr>
<td>
<?php
echo $row['id'];
?>
</td>

<td>
<a
class="incident-link"
href="incident_details.php?id=<?php echo $row['id']; ?>"
>
<?php
echo $row['title'];
?>
</a>
</td>

<td>
<?php
echo $row['affected_user'];
?>
</td>

<td>
<?php
echo $row['severity'];
?>
</td>

<td>
<?php
echo $row['status'];
?>
</td>

<td>
<?php
echo $row['source'];
?>
</td>

<td>
<?php
echo date(
"d M Y H:i",
strtotime(
$row['created_at']
)
);
?>
</td>
</tr>
<?php
}
?>

</table>

<br><br>

<div style="text-align:center;">

<a
href="malware_scan.php">
<button>
Malware Detection
</button>
</a>

&nbsp;&nbsp;

<a
href="logout.php">
<button>
Logout
</button>
</a>

</div>
</div>
</body>
</html>