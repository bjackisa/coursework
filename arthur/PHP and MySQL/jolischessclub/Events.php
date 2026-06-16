<html>
   <head>
    <title> BASIC</title>
    <link href=".\assets\css\css.css" rel="stylesheet" type="text/css">
   </head>
<body class="red">
<?php include "includes/header.php";
 ?>   
  
  

<?php
echo "<h1>We do have some upcoming events.</h1>";

$event = [
    " Internal Rapid Chess Tournament" => "2026-08-15",
    " Inter-club Chess Tournament" => "2026-09-10",
    "Chess Exhibition" => "2026-10-05"
];

foreach ($event as $name => $date) {
    echo "<p>$name &emsp; $date</p>";
}
?>

<?php include "includes/footer.php";
 ?>  
</body>
</html>