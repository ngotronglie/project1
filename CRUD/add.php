<?php
require "config.php";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $date = date('Y-m-d H:i:s'); // Use a format suitable for SQL datetime
    $insert = $conn->prepare("INSERT INTO tasks (name, created_at) VALUES (:name, :created_at)");
    $insert->execute(['name' => $name, 'created_at' => $date]);
    echo "<script>alert('nhập thành công dữ liệu')</script>";
    header('Location: index.php');
} else {
    echo "<h2 class='text-center bg-warning p-3'>không có dữ liệu</h2>";
}


?>

<!doctype html>
<html lang="en">

<head>
    <title>Thêm Tasks</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>


<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main class="container">

        <form action="add.php" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelpId" placeholder="Enter task name" required />
            </div>
            <button name="submit" type="submit" class="btn btn-primary">Save</button>
        </form>


    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>