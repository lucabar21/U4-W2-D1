<?php
include_once __DIR__ . "/includes/init.php";

$user = [];
$username = $_POST['username'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $stmt = $pdo->prepare("INSERT INTO users (username,email,password) VALUES (:username,:email,:password)");
    $stmt->execute(['username' => $username, 'email' => $email, 'password' => password_hash($password, PASSWORD_DEFAULT)]);

    header('Location: /U4-W2-D1/homepage.php');
    exit;
}

?>

<?php
include_once __DIR__ . "/includes/initial.php";
?>

<div class="col-8">
    <h3 class="text-center">Sign in</h3>
    <form action="" method="post">
        <div class="mb-2">
            <label for="exampleFormControlInput1" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="
                exampleFormControlInput1">
        </div>
        <div class="mb-2">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id=" exampleFormControlInput1">
        </div>
        <div class="mb-2">
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="exampleFormControlInput1">
        </div>
        <div class="d-flex justify-content-center"><button type="submit" class="btn btn-primary">Send</button></div>
    </form>
</div>


<?php include_once __DIR__ . "/includes/end.php";