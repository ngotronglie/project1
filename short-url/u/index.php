<?php

require '../config.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $select = $conn->query("SELECT * FROM url WHERE id = $id");
    $select->execute();
    $url = $select->fetch(PDO::FETCH_OBJ);
    $url = $url['url'];
    header("Location: $url");
}
