<?php
require "config.php";


if (isset($_POST['submit'])) {
    $url = isset($_POST['url']) ? trim($_POST['url']) : '';

    if (empty($url)) {
        echo '<h3 class="text-center bg-warning p-2 mb-3">The input is empty</h3>';
    } else {
        $insert = $conn->prepare("INSERT INTO url (url) VALUES (:url)");
        $insert->execute(['url' => $url]);
        header('Location: index.php');
        exit;
    }
}

// Fetch URLs from the database
$urls = $conn->query("SELECT * FROM url")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>URL Shortener</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body {
            overflow: hidden;
        }

        .margin {
            margin-top: 200px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <form class="card p-2 margin" method="POST" action="index.php">
                    <div class="input-group">
                        <input name="url" type="text" class="form-control" placeholder="Enter your URL" required>
                        <div class="input-group-append">
                            <button type="submit" name="submit" class="btn btn-success">Shorten</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">URL</th>
                            <th scope="col">URL shorting</th>
                            <th scope="col">clicks</th>
                            <th scope="col">Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($urls)) : ?>
                            <?php foreach ($urls as $index => $url) : ?>
                                <tr>
                                    <th scope="row"><?php echo $index + 1; ?></th>

                                    <td><?php echo ($url['url']); ?></td>
                                    <td><a href="/short-url/u/index.php?id=<?php echo $url['id']; ?>" target="_blank">nhấp nào đây để mở trang mới</a></td>
                                    <!-- mục tiêu cái này là nhấp vào đường link này nhưng nó lại sang trang khác -->
                                    <td><?php echo ($url['clicks']); ?></td>
                                    <td><?php echo ($url['created_at']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="3" class="text-center">No URLs found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>

</html>