<?php
date_default_timezone_set('Africa/Kampala');
$hour = (int) date('G');
if ($hour < 12) {
    $greeting = 'Good morning';
    $headline = 'Rise and play!';
    $description = 'Start your day with a strong opening and a fresh mind.';
    $extra = 'Check out our morning tactics drills.';
} elseif ($hour < 18) {
    $greeting = 'Good afternoon';
    $headline = 'Time to sharpen your strategy.';
    $description = 'This is the best time to review your recent games and train.';
    $extra = 'Join our afternoon study group for puzzles and analysis.';
} else {
    $greeting = 'Good evening';
    $headline = 'Relax with a calm chess session.';
    $description = 'Wind down with endgame practice and friendly matches.';
    $extra = 'Enjoy our evening club highlights and tournament recaps.';
}

$membersFile = __DIR__ . '/members.json';
$members = [];
if (file_exists($membersFile)) {
    $json = file_get_contents($membersFile);
    $members = json_decode($json, true) ?? [];
}

$events = [
    'Internal Rapid Chess Tournament' => '2026-08-15',
    'Inter-club Chess Tournament' => '2026-09-10',
    'Chess Exhibition' => '2026-10-05',
];

$wonTournaments = [
    'Kampala Chess Tournament 2012' => 'Won',
    'Entebbe Chess Tournament 2013' => 'Won',
    'Uganda Chess Tournament 2015' => 'Won',
];
$lostTournaments = [
    'Kampala Chess Tournament 2020' => 'Lost',
    'Entebbe Chess Tournament 2021' => 'Lost',
    'Uganda Chess Tournament 2022' => 'Lost',
];

$totalMembers = count($members);
$totalEvents = count($events);
$totalTournaments = count($wonTournaments) + count($lostTournaments);
?>
<html>
<head>
<title>Jolis Chess club of Arkright.</title>
    <link href=".\assets\css\css.css" rel="stylesheet">
</head>
<body class="red">
   
<?php include "includes/header.php";
 ?>   
   <div class="container mt-4">
       <div class="jumbotron bg-dark text-dark rounded p-4">
           <h1><?php echo $greeting; ?>!</h1>
           <p class="lead"><?php echo $description; ?></p>
           <p><strong><?php echo $headline; ?></strong></p>
           <p><?php echo $extra; ?></p>
       </div>

       <div class="row text-center mt-4">
           <div class="col-md-4 mb-3">
               <div class="card shadow-sm h-100">
                   <div class="card-body">
                    <p class="mb-0">Total Members</p>
                       <h2><?php echo $totalMembers; ?></h2>
                  </div>
               </div>
           </div>
           <div class="col-md-4 mb-3">
               <div class="card shadow-sm h-100">
                   <div class="card-body">
                    <p class="mb-0">Upcoming Events</p>
                       <h2><?php echo $totalEvents; ?></h2>
                   </div>
               </div>
           </div>
           <div class="col-md-4 mb-3">
               <div class="card shadow-sm h-100">
                   <div class="card-body">
                    <p class="mb-0">Tournaments Played</p>
                       <h2><?php echo $totalTournaments; ?></h2>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <h1>Official Website of the Chess Club of Jolis Academy</h1>
   
   
   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.8019722959953!2d32.54530537496453!3d0.1640189998343705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x177d9162204e6ec1%3A0xd3aecb379267b9d8!2sJolis%20ICT%20Academy!5e0!3m2!1sen!2sug!4v1778484094815!5m2!1sen!2sug" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
   
   <br>
   
<?php include "includes/footer.php";
 ?>   
   
   
</body>
</html>