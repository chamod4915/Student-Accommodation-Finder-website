<?php

session_start();
include('includes/config/dbconn.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Property Listing</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries  -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!--  Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0 pl-0 pr-0">
        <?php include('includes/header.php'); ?>

        <div class="container-xxl p-0 pl-0 pr-0 py-5" style="height: 100vh;">
            <div class="container-xxl p-0 pl-0 pr-0" style="min-height: -webkit-fill-available;">
                <div class="row g-5 align-items-center" style="margin-top: 1px; max-width: 100%; overflow: hidden;">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="position-relative overflow-hidden p-5 pe-0" style="margin-top: -6rem;">
                            <img class="img-fluid w-100" style="height: 410px;" src="img/ac.jpg">
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" style="margin-top: 0;" data-wow-delay="0.5s">
                        <h1 class="mb-4">Our Story</h1>
                        <p class="mb-4">Welcome to HomeScope, your go-to platform for finding accommodation near NSBM University! We understand the importance of comfortable and convenient living arrangements, especially for students embarking on their academic journey. Our platform is designed to simplify the process of finding the perfect place to call home during your time at NSBM.</p>
                        <p class="mb-4"> At HomeScope, we curate a list of verified accommodation options, ensuring that each listing meets our quality standards. Whether you're looking for a shared apartment, a private room, or a homestay, we have a range of options to suit your needs and budget. Our user-friendly interface allows you to easily browse through available listings, view photos, read reviews from previous tenants, and connect directly with landlords. Say goodbye to the stress of house hunting and let HomeScope help you find your ideal accommodation near NSBM University!</p>
                        <a class="btn btn-primary py-3 px-5 mt-3 mb-5" href="property-list.php">Find a Property</a>
                    </div>
                </div>
            </div>

            <?php include('includes/footer.php'); ?>

        </div>

    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>