<html>
   <head>
    <title> BASIC</title>
    <link href=".\assets\css\css.css"rel="stylesheet">
   </head>
<body class="red">
<?php include "includes/header.php";
 ?>  
  <h1>Tournaments We Have Participated In</h1>
  
<?php
$won = [
   "Kampala Chess Tournament 2012" => "Won",
   "Entebbe Chess Tournament 2013" => "Won",
   "Uganda Chess Tournament 2015" => "Won",
];
 $lost = [
    "Kampala Chess Tournament 2020" => "Lost",
    "Entebbe Chess Tournament 2021" => "Lost",
    "Uganda Chess Tournament 2022" => "Lost",
 ];

echo "<h2>Tournaments Won</h2>";
foreach ($won as $win => $status) {
    echo "<p>$win &emsp; $status</p>";
}
echo "<h2>Tournaments Lost</h2>";
foreach ($lost as $loss => $status) {
    echo "<p>$loss &emsp; $status</p>";
}
?>
 <?php include "includes/footer.php";
 ?>
  
  
</body>
</html>