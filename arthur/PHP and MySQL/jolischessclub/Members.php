<html>
   <head>
    <title>Members</title>
    <link href=".\assets\css\css.css"rel="stylesheet">
   </head>
<body class="red">
<?php include "includes/header.php";
 ?>  
  <h1>Members Of The Chess Club</h1>
  


<?php
$members = [
    "Migel Lwanga",
    "John Doe",
    "Jane Smith",
    "Emily Davis",
    ];

    $photos = [
        "Migel Lwanga" => "mem1.jpg",
        "John Doe" => "mem2.jpg",
        "Jane Smith" => "mem3.jpg",
        "Emily Davis" => "mem4.jpg",
        
    ];
  
  foreach ($members as $member) {
    echo "<ul type='square'><li>$member</li></ul>";
    echo "<img src='.\assets\images\\$photos[$member]' alt='$member' width='100' height='100'>";
  }
  ?>
  <?php include "includes/footer.php";
 ?>
  
   
  
</body>
</html>