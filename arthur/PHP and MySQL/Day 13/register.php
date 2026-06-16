<?php
include 'config.php';
$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $plain_password = $_POST['password'];
    $encrypted_password = md5($plain_password); 
    $name = $_POST['name'];
    $email = $_POST['email'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg = "<div class='alert alert-danger'>Error: Invalid email address format.</div>";
    } else {
        $stmt = $conn->prepare("INSERT INTO names (username, password, name, email) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $encrypted_password, $name, $email);

        if ($stmt->execute()) {
            $msg = "<div class='alert alert-success'>User registered successfully with PHP MD5 encryption!</div>";
        } else {
            $msg = "<div class='alert alert-danger'>Error: Username might already exist.</div>";
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Register User</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"></head>
<body class="bg-light">
<div class="container d-flex justify-content-center align-items-center vh-100">
<div class="card p-4 shadow-sm" style="width: 100%; max-width: 450px;">
<h2 class="text-center mb-4">Create New Account</h2>
<?php echo $msg; ?>
<form method="POST" action="">
<div class="mb-3">
<label class="form-label">Username</label>
<input type="text" name="username" class="form-control" placeholder="Enter username" required>
</div>
<div class="mb-3">
<label class="form-label">Password</label>
<input type="password" name="password" class="form-control" placeholder="Enter password" required>
</div>
<div class="mb-3">
<label class="form-label">Full Name</label>
<input type="text" name="name" class="form-control" placeholder="Enter full name" required>
</div>
<div class="mb-3">
<label class="form-label">Email address</label>
<input type="email" name="email" class="form-control" placeholder="Enter email" required>
</div>
<button type="submit" class="btn btn-success w-100 mb-3">Register User</button>
</form>
<div class="text-center">
<a href="login.php" class="text-decoration-none">Go to Login</a>
</div>
</div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>
