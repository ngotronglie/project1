<?php

require "includes/header.php";
require "includes/config.php";
?>
<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM photo WHERE id = $id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $photo = $stmt->fetch(PDO::FETCH_ASSOC);



    $sql = "SELECT * FROM photo WHERE id != :id";
    $stmt = $conn->prepare($sql);

    // Bind the selected category ID to the placeholder
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // Execute the statement
    $stmt->execute();

    // Fetch the results
    $AllPhoto = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>
<div class="container tm-container-content tm-mt-60">
    <div class="row mb-4">
        <h2 class="col-12 tm-text-primary"><?= $photo['title'] ?></h2>
    </div>
    <div class="row tm-mb-90">
        <div class="col-xl-8 col-lg-7 col-md-6 col-sm-12">
            <img src="<?php echo $photo['img'] ?>" alt="Image" class="img-fluid w-100">
        </div>
        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
            <div class="tm-bg-gray tm-video-details">

                <div class="mb-4">
                    <h3 class="tm-text-gray-dark">Description</h3>
                    <p><?php echo $photo['description'] ?></p>
                </div>

            </div>
        </div>


    </div>
    <div class="row mb-4">
        <h2 class="col-12 tm-text-primary">
            Explore More Photos
        </h2>
    </div>
    <div class="row mb-3 tm-gallery">


        <?php foreach ($AllPhoto as $photo) : ?>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                <figure class="effect-ming tm-video-item">
                    <img src="<?php echo $photo['img'] ?>" alt="Image" class="img-fluid">
                    <figcaption class="d-flex align-items-center justify-content-center">
                        <h2><?= $photo['title'] ?></h2>
                        <a href="photo-detail.php?id=<?php echo $photo['id'] ?>">View more</a>
                    </figcaption>
                </figure>
                <div class="d-flex justify-content-between tm-text-gray">
                    <span class="tm-text-gray-light"><?php echo $photo['create_at'] ?></span>
                    <span>by <?php echo $photo['username'] ?></span>
                </div>
            </div>

        <?php endforeach; ?>
    </div> <!-- row -->
</div> <!-- container-fluid, tm-container-content -->

<?php require_once 'includes/footer.php'; ?>