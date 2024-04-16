<?php
include_once __DIR__ . "/includes/init.php";
$errors = [];

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare(" SELECT * FROM users WHERE username = :username ");
    $stmt->execute(['username' => $username]);


    $user_logged = $stmt->fetch();

    if ($user_logged) {
        if (password_verify($password, $user_logged['password'])) {
            $_SESSION['id'] = $user_logged['id'];
            header('Location: /U4-W2-D1/homepage.php');
        } else {
            $errors['credentials'] = 'Invalid credentials';
        }
    }
}
?>

<?php
include_once __DIR__ . "/includes/initial.php";
?>

<div class="col-8">
    <h3 class="text-center">Log in</h3>
    <form action="" method="post">
        <div class="mb-2">
            <label for="exampleFormControlInput1" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" value="<?= $username ?>"
                id="exampleFormControlInput1">
        </div>
        <div class="mb-2">
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" value="" id="exampleFormControlInput1">
        </div>
        <?= isset($errors['credentials']) ? "<div class='alert alert-danger text-center' role='alert'>
        Invalid credentials
    </div>" : "" ?>
        <div class="d-flex justify-content-center"><button type="sumbit" class="btn btn-primary">Login</button></div>
    </form>
</div>

<?php include_once __DIR__ . "/includes/end.php";