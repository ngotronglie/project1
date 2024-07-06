<?php
require_once 'includes/header.php';
require_once 'includes/config.php';


// xử lí
if (isset($_POST['submit'])) {
    if (empty($_POST['title']) || empty($_POST['description'])) {
        echo '<p class="alert alert-danger">Vui lòng nhập tiêu đề và mô tả</p>';
    } else {
        $title = $_POST['title'];
        $description = $_POST['description'];

        $img = $_FILES['img']['name'];
        $ext = pathinfo($img, PATHINFO_EXTENSION);
        $new_img_name = time() . '_' . uniqid() . '.' . $ext;
        $dir = 'img/' . $new_img_name;

        $username = $_SESSION['user'];

        $insert = $conn->prepare("INSERT INTO photo (title, description, img, username) VALUES (:title, :description, :img, :username)");

        $insert->bindParam(':title', $title);
        $insert->bindParam(':description', $description);
        $insert->bindParam(':img', $dir);
        $insert->bindParam(':username', $username);
        $insert->execute();

        if (move_uploaded_file($_FILES['img']['tmp_name'], $dir)) {
            header("Location: index.php");
        } else {
            echo '<p class="alert alert-danger">Không thể tải lên tệp hình ảnh.</p>';
        }
    }
}


?>

<div class="container tm-container-content tm-mt-60">
    <div class="row mb-4">
        <h2 class="col-6 tm-text-primary">
            Create Photo
        </h2>

    </div>
    <div class="row mb-4">


        <form method="POST" action="create.php" enctype="multipart/form-data">
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="text" name="title" id="form2Example1" class="form-control" placeholder="title" />

            </div>



            <div class="form-outline mb-4">
                <textarea type="text" name="description" id="form2Example1" class="form-control" placeholder="description" rows="8"></textarea>
            </div>



            <div class="form-outline mb-4">
                <input type="file" name="img" id="form2Example1" class="form-control" placeholder="image" />
            </div>


            <!-- Submit button -->
            <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>


        </form>
    </div>
</div>

<footer class="tm-bg-gray pt-5 pb-3 tm-text-gray tm-footer">
    <div class="container-fluid tm-container-small">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-12 px-5 mb-5">
                <h3 class="tm-text-primary mb-4 tm-footer-title">About Catalog-Z</h3>
                <p>Catalog-Z is free <a rel="sponsored" href="https://v5.getbootstrap.com/">Bootstrap 5</a> Alpha 2 HTML Template for video and photo websites. You can freely use this TemplateMo layout for a front-end integration with any kind of CMS website.</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 px-5 mb-5">
                <h3 class="tm-text-primary mb-4 tm-footer-title">Our Links</h3>
                <ul class="tm-footer-links pl-0">
                    <li><a href="#">Advertise</a></li>
                    <li><a href="#">Support</a></li>
                    <li><a href="#">Our Company</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 px-5 mb-5">
                <ul class="tm-social-links d-flex justify-content-end pl-0 mb-5">
                    <li class="mb-2"><a href="https://facebook.com"><i class="fab fa-facebook"></i></a></li>
                    <li class="mb-2"><a href="https://twitter.com"><i class="fab fa-twitter"></i></a></li>
                    <li class="mb-2"><a href="https://instagram.com"><i class="fab fa-instagram"></i></a></li>
                    <li class="mb-2"><a href="https://pinterest.com"><i class="fab fa-pinterest"></i></a></li>
                </ul>
                <a href="#" class="tm-text-gray text-right d-block mb-2">Terms of Use</a>
                <a href="#" class="tm-text-gray text-right d-block">Privacy Policy</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-7 col-12 px-5 mb-3">
                Copyright 2020 Catalog-Z Company. All rights reserved.
            </div>
            <div class="col-lg-4 col-md-5 col-12 px-5 text-right">
                Designed by <a href="https://templatemo.com" class="tm-text-gray" rel="sponsored" target="_parent">TemplateMo</a>
            </div>
        </div>
    </div>
</footer>

<script src="js/plugins.js"></script>
<script>
    $(window).on("load", function() {
        $('body').addClass('loaded');
    });
</script>
</body>

</html>