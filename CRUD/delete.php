<?php

require "config.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM tasks WHERE id = $id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header("Location: /CRUD");
}
