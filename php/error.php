<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "srhdevmw_skaska";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Bağlantı hatası: " . $conn->connect_error);
}

if (!isset($_SESSION['username'])) {
    header("Location: ../login/login.php");
    exit();
  }

$username = $_SESSION['username'];
$sql_ban = "SELECT banned FROM members WHERE username='$username'";
$result_ban = $conn->query($sql_ban);

if ($result_ban && $result_ban->num_rows > 0) {
  $row_ban = $result_ban->fetch_assoc();
  $banned = $row_ban['banned'];

  if ($banned == 1) {
    header("Location: login/banned.php");
    exit();
  }
}


  $conn->close();
?>
<!DOCTYPE html>
<head>
  <title>Oopps !🥴</title>
  
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
<style>
  body{
    background-image: url("ARKAPLAN_RESIM_URL");
    background-size: cover;
    background-position: center center;
    background-attachment: fixed;
}

body::before {
    content: "";
    background-image: url("ARKAPLAN_RESIM_URL");
    background-size: cover;
    background-position: center center;
    background-attachment: fixed;
    filter: blur(5px);
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    z-index: -1;
}

h1 {
    color: red;
    font-size: 50px;
  }
   p1 {
    color: white;
    font-size: 35px;
   }
</style>
</head>

<h1>Opps!! 🥴🥴</h1>

<p1>Sanırım bu sayfaya erişiminiz yok veya böyle bir sayfa bulunamadı 🥴🥴</p1>
<div class="center">
  <img src="https://cdn.discordapp.com/attachments/827928307139477585/1110675435945197699/error.gif" alt="Error Xd">
</div>
</html>