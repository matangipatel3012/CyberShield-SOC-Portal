<?php

session_start();

include 'db.php';

if(!isset($_SESSION['user']))
{
header("Location: login.php");
exit();
}

$id=$_GET['id'];
$showInvestigation = false;

if(isset($_GET['investigate']))
{
    $showInvestigation = true;
}

if(isset($_POST['resolve']))
{

mysqli_query(
$conn,
"UPDATE incidents
SET status='Resolved'
WHERE id='$id'");
}

$result=
mysqli_query(
$conn,
"SELECT *FROM incidents
WHERE id='$id'");

$row=
mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>

<html>

<head>

<title>
Incident Details
</title>

<link
rel="stylesheet"
href="style.css">

</head>

<body>

<div class="incident-page">

<div class="incident-card">

<h2>
<?php echo $row['title']; ?>
</h2>

<hr>

<p>
<b>User:</b>
<?php echo $row['affected_user']; ?>
</p>

<p>
<b>Severity:</b>
<?php echo $row['severity']; ?>
</p>

<p>
<b>Status:</b>
<?php echo $row['status']; ?>
</p>

<p>
<b>Source:</b>
<?php echo $row['source']; ?>
</p>

<p>
<b>Detected Time:</b>

<?php
echo date(
"d M Y H:i",
strtotime($row['created_at'])
);
?>
</p>

<p>
<b>Description:</b>
<?php echo $row['description']; ?>
</p>

<hr>

<?php if($showInvestigation==false){ ?>

<div class="investigation-buttons">
<a href="incident_details.php?id=<?php echo $id; ?>&investigate=1">
<button type="button">
Investigation
</button>
</a>

<a href="dashboard.php">
<button type="button">
Back To Dashboard
</button>
</a>
</div>

<?php } else { ?>


<hr>

<div class="investigation-buttons">
<a href="investigation.php?id=<?php echo $id; ?>">

<button type="button">
Investigation
</button>
</a>

<a href="dashboard.php">
<button type="button">
Back To Dashboard
</button>
</a>

</div>

<?php } ?>

</div>

</div>

</body>
</html>