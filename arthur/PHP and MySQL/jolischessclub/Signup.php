<?php
$dataFile = __DIR__ . '/members.json';
$members = [];
if (file_exists($dataFile)) {
    $json = file_get_contents($dataFile);
    $members = json_decode($json, true) ?? [];
}

$fullname = '';
$birthdate = '';
$region = '';
$email = '';
$errors = [];
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = trim($_POST['fullname'] ?? '');
    $birthdate = trim($_POST['birthdate'] ?? '');
    $region = trim($_POST['region'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';

    if ($fullname === '') {
        $errors[] = 'Please enter your full name.';
    }
    if ($birthdate === '') {
        $errors[] = 'Please enter your birth date.';
    }
    if ($region === '' || $region === 'Region') {
        $errors[] = 'Please select your region.';
    }
    if ($email === '') {
        $errors[] = 'Please enter your email address.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address.';
    }
    if ($password === '') {
        $errors[] = 'Please enter a password.';
    }
    if ($confirmPassword === '') {
        $errors[] = 'Please confirm your password.';
    }
    if ($password !== '' && $confirmPassword !== '' && $password !== $confirmPassword) {
        $errors[] = 'Passwords do not match.';
    }

    if (empty($errors)) {
        $newMember = [
            'fullname' => $fullname,
            'birthdate' => $birthdate,
            'region' => $region,
            'email' => $email,
            'registered_at' => date('c'),
        ];

        $members[] = $newMember;
        file_put_contents($dataFile, json_encode($members, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES), LOCK_EX);

        $success = 'Your sign-up information has been received and saved.';
        $fullname = '';
        $birthdate = '';
        $region = '';
        $email = '';
    }
}
?>
<html>
   <head>
    <title>Get Started</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">    <link href=".\assets\css\css.css"rel="stylesheet">
   </head>
<body class="red">
<?php include "includes/header.php";
 ?>  
 <?php if (!empty($success) || !empty($errors)): ?>
    <div class="container mt-4">
        <?php if (!empty($success)): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo htmlspecialchars($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>
 <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
  <div>
  
     <div>
	<div class="row">
	<div class="col-md-12"> 
	Full Name
	<input type="text" placeholder="full name" name="fullname" class="form-control" value="<?php echo htmlspecialchars($fullname); ?>">
	</div>
	</div>
	<br>
	
	<div class="row">
	<div class="col-md-12"> 
	Birth Date
	<input type="text" placeholder="Birth Date" name="birthdate" class="form-control" required value="<?php echo htmlspecialchars($birthdate); ?>">
	</div>
	</div>
	<br>
	
	<div class="row">
	<div class="col-md-12"> 
	Password
	<input type="password" placeholder="Password" name="password" class="form-control" required>
	</div>
	</div>
	<br>
	
	<div class="row">
	<div class="col-md-12"> 
	<select class="form-control" name="region" required>
	<option value="">Region</option>
	<option value="Usa" <?php echo $region === 'Usa' ? 'selected' : ''; ?>>Usa</option>
	<option value="UK" <?php echo $region === 'UK' ? 'selected' : ''; ?>>UK</option>
	<option value="Uganda" <?php echo $region === 'Uganda' ? 'selected' : ''; ?>>Uganda</option>
	<option value="Kenya" <?php echo $region === 'Kenya' ? 'selected' : ''; ?>>Kenya</option>
	</select>
	</div>
	</div>
	<br>
	
	<div class="row">
	<div class="col-md-12"> 
	Confirm Password
	<input type="password" placeholder="Confirm Password" name="confirm_password" class="form-control" required>
	</div>
	</div>
	<br>
	
	
	<div class="row">
	<div class="col-md-12"> 
	Email
	<input type="email" placeholder="Email" name="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>" required>
	</div>
	</div>
	<br>
	
	<div class="row">
	<div class="col-md-12"> 
	<input type="submit"  name="Submit" class="btn btn-success form-control">
	</div>
	</div>
	<br>
	</div>
  </div>
  </form>

<?php include "includes/footer.php";
 ?>
	

  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  </div>
  
  
</body>
</html>