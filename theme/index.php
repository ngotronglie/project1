<?php

require_once 'includes/header.php';
require_once 'includes/config.php';

?>


<?php
$select = $conn->prepare("SELECT * FROM photo ORDER BY id DESC");
$select->execute();
$photos = $select->fetchAll(PDO::FETCH_OBJ);

?>

<div class="container tm-container-content tm-mt-60">
    <div class="row mb-4">
        <h2 class="col-6 tm-text-primary">
            Latest Photos
        </h2>

    </div>


    <div class="row tm-mb-90 tm-gallery">
        <?php foreach ($photos as $photo) : ?>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                <figure class="effect-ming tm-video-item">
                    <img width="100%" src="<?= $photo->img ?>" alt="Image" class="img-fluid">
                    <figcaption class="d-flex align-items-center justify-content-center">
                        <h2><?= $photo->title ?></h2>
                        <a href="photo-detail.php?id=<?= $photo->id ?>">View more</a>
                    </figcaption>
                </figure>
                <div class="d-flex justify-content-between tm-text-gray">
                    <span class="tm-text-gray-light"><?= $photo->create_at ?></span>
                    <span><?= $photo->username ?></span>
                </div>
            </div>
        <?php endforeach; ?>


    </div> <!-- row -->

</div> <!-- container-fluid, tm-container-content -->

<?php require_once 'includes/footer.php'; ?>