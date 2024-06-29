<?php

require '../config.php';

if (isset($_GET['id'])) {
    // Sanitize input
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // Prepare and execute the select statement
    $select = $conn->prepare("SELECT * FROM url WHERE id = :id");
    $select->bindParam(':id', $id, PDO::PARAM_INT);
    $select->execute();
    $url = $select->fetch(PDO::FETCH_OBJ);

    if ($url) {
        // Increment clicks
        $clicks = $url->clicks + 1;

        // Prepare and execute the update statement
        $update = $conn->prepare("UPDATE url SET clicks = :clicks WHERE id = :id");
        $update->bindParam(':clicks', $clicks, PDO::PARAM_INT);
        $update->bindParam(':id', $id, PDO::PARAM_INT);
        $update->execute();

        // Redirect to the URL
        $urlLink = $url->url;
        header("Location: $urlLink");
        exit();
    } else {
        echo "URL not found.";
    }
} else {
    echo "ID not set.";
}
