<?php
require "includes/header.php";
require "./config.php";

if (isset($_POST['submit'])) {
  $email = isset($_POST['email']) ? trim($_POST['email']) : '';
  $username = isset($_POST['username']) ? trim($_POST['username']) : '';
  $password = isset($_POST['password']) ? trim($_POST['password']) : '';

  if (empty($email) || empty($username) || empty($password)) {
    echo '<h3 class="text-center bg-warning p-2 mb-3">Vui lòng nhập vào ô trống!!!</h3>';
  } else {
    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Prepare the SQL statement
    $insert = $conn->prepare("INSERT INTO user (email, username, password) VALUES (:email, :username, :password)");

    // Bind parameters
    $insert->bindParam(':email', $email);
    $insert->bindParam(':username', $username);
    $insert->bindParam(':password', $hashedPassword);

    // Execute the statement
    if ($insert->execute()) {
      echo '<h3 class="text-center bg-success p-2 mb-3">Đăng ký thành công!</h3>';
    } else {
      echo '<h3 class="text-center bg-danger p-2 mb-3">Đã xảy ra lỗi. Vui lòng thử lại sau!</h3>';
    }
  }
}
?>

<main class="form-signin w-50 m-auto">
  <form method="POST" action="register.php">

    <h1 class="h3 mt-5 fw-normal text-center">Please Register</h1>

    <div class="form-floating">
      <input name="email" type="email" class="form-control" id="floatingEmail" placeholder="name@example.com">
      <label for="floatingEmail">Email address</label>
    </div>

    <div class="form-floating">
      <input name="username" type="text" class="form-control" id="floatingUsername" placeholder="user.name">
      <label for="floatingUsername">Username</label>
    </div>

    <div class="form-floating">
      <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <button name="submit" class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
    <h6 class="mt-3">Already have an account? <a href="login.php">Login</a></h6>

  </form>
</main>

<?php require "includes/footer.php"; ?>