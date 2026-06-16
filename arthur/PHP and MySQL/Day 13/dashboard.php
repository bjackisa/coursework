<?php
include 'config.php';

if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $stmt = $conn->prepare("DELETE FROM names WHERE id = ?");
    $stmt->bind_param("i", $delete_id);
    
    if ($stmt->execute()) {
        header("Location: dashboard.php?msg=Deleted");
        exit();
    }
    $stmt->close();
}

$result = $conn->query("SELECT id, username, password, name, email FROM names");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Dashboard</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"></head>
<body class="bg-light">
<div class="container my-5">
<div class="card shadow-sm p-4">
<h2 class="mb-4 text-center">User Administration Dashboard</h2>
<?php if (isset($_GET['msg'])) { echo "<div class='alert alert-info text-center'>User record successfully deleted from database.</div>"; } ?>

<div class="table-responsive">
<table class="table table-striped table-hover align-middle border">
<thead class="table-dark">
<tr>
<th>ID</th>
<th>Username</th>
<th>Encrypted Password (MD5)</th>
<th>Name</th>
<th>Email</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
<?php while($row = $result->fetch_assoc()): ?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo htmlspecialchars($row['username']); ?></td>
<td><code class="text-secondary">••••••••</code></td>
<td><?php echo htmlspecialchars($row['name']); ?></td>
<td><?php echo htmlspecialchars($row['email']); ?></td>
<td>
<a href="dashboard.php?delete_id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this user?');">Delete</a>
</td>
</tr>
<?php endwhile; ?>
</tbody>
</table>
</div>

<div class="d-flex justify-content-center gap-3 mt-4">
<a href="register.php" class="btn btn-outline-success">Add New User</a>
<a href="login.php" class="btn btn-outline-primary">Login Page</a>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
