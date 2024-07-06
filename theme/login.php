<?php require "includes/header.php"; ?>
<?php require "includes/config.php"; ?>

<?php

if (isset($_POST['submit'])) {
  $email = isset($_POST['email']) ? trim($_POST['email']) : '';
  $password = isset($_POST['password']) ? trim($_POST['password']) : '';

  if (empty($email) || empty($password)) {
    echo '<h3 class="text-center bg-warning p-2 mb-3">hãy nhập các trường vào!!! </h3>';
  } else {
    $stmt = $conn->prepare("SELECT * FROM user WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
      $_SESSION['user'] = $user['username'];
      echo $_SESSION['user'];
      // echo '<h3 class="text-center bg-success p-2 mb-3">Login successful!</h3>';
      header("Location: index.php");
    } else {
      echo '<h3 class="text-center bg-danger p-2 mb-3">Login failed</h3>';
    }
  }
}
?>

<main class="form-signin w-50 m-auto">
  <form method="POST" action="login.php">
    <h1 class="h3 mt-5 fw-normal text-center">Please sign in</h1>

    <div class="form-floating">
      <label for="floatingInput">Email address</label>
      <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
    </div>

    <div class="form-floating">
      <label for="floatingPassword">Password</label>
      <input name="password" type="password" class="form-control mb-5" id="floatingPassword" placeholder="Password">
    </div>

    <button name="submit" class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <h6 class="mt-3">Don't have an account? <a href="register.php">Create your account</a></h6>
  </form>
</main>

<?php require "includes/footer.php"; ?>