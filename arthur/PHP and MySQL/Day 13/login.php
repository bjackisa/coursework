<?php
include 'config.php';
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password_input = md5($_POST['password']); 

    $stmt = $conn->prepare("SELECT id FROM names WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password_input);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $message = "<div class='alert alert-success'>Login is Successful</div>";
    } else {
        $message = "<div class='alert alert-danger'>Login UnSuccessful</div>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">

<title>Login</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"></head>
<body class="bg-light">
<div class="container d-flex justify-content-center align-items-center vh-100">
<div class="card p-4 shadow-sm" style="width: 100%; max-width: 400px;">
<h2 class="text-center mb-4">System Login</h2>
<?php echo $message; ?>
<form method="POST" action="">
<div class="mb-3">
<label class="form-label">Username</label>
<input type="text" name="username" class="form-control" placeholder="Username" required>
</div>
<div class="mb-3">
<label class="form-label">Password</label>
<input type="password" name="password" class="form-control" placeholder="Password" required>
</div>
<button type="submit" class="btn btn-primary w-100 mb-3">Login</button>
</form>
<div class="text-center">
<a href="dashboard.php" class="text-decoration-none">View Admin Dashboard</a>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
