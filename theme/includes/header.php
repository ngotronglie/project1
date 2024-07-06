<?php

session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalog-Z Bootstrap 5.0 HTML Template</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
    <!--
    
TemplateMo 556 Catalog-Z

https://templatemo.com/tm-556-catalog-z

-->
</head>

<body>
    <!-- Page Loader -->
    <div id="loader-wrapper">
        <div id="loader"></div>

        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>

    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/theme/index.php">
                <i class="fas fa-film mr-2"></i>
                Catalog-Z
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0">


                    <?php
                    if ($_SESSION) : ?>
                        <li class="nav-item">
                            <a class="nav-link nav-link-1 active" aria-current="page">Welcome, <?php echo $_SESSION['user']; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-1 active" aria-current="page" href="index.html">Photos</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link nav-link-1 active" aria-current="page" href="/theme/create.php">create</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-1 active" aria-current="page" href="/theme/logout.php">logout</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link nav-link-1 active" aria-current="page" href="/theme/register.php">register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-1 active" aria-current="page" href="/theme/login.php">login</a>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>
        </div>
    </nav>

    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="img/hero.jpg">
        <form class="d-flex tm-search-form">
            <input class="form-control tm-search-input" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success tm-search-btn" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
        <!-- <?php echo "đã thêm header" ?> -->
    </div>