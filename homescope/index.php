<?php

session_start();
include('includes/config/dbconn.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Accommodation Listing</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <!-- <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet"> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
    <!-- Header -->
    <?php include('includes/header.php'); ?>

    <div style="min-height: 30vh; !important">
        <div class="item" style="background-image: url('img/hero-bg.jpg'); background-size: cover;">
            <div class="hero-section">
            <div class="hero-overlay"></div>
            <div class="hero-content">
                <h1 class="display-5mb-4" style="color: white !important;">Welcome to HomeScope</h1>
                <p class="animated fadeIn mb-4 pb-2">We help university students to find their perfect dorm.</p>
                <a href="sign-up.php" class="btn btn-primary py-3 px-5 me-3 animated fadeIn">Register Now</a>
                <a href="property-list.php" class="btn btn-primary py-3 px-5 me-3 animated fadeIn">Browse Properties</a>
            </div>
            </div>
        </div>
    </div>

        <div class="container-xxl">
            <div class="row g-5 align-items-center mt-5" style="margin-top: 1px; max-width: 100%; overflow: hidden;">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="position-relative overflow-hidden p-5 pe-0" style="margin-top: -6rem;">
                        <img class="img-fluid w-100" src="img/ac.jpg">
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

        <div class="container-xxl" style="overflow: hidden;">
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <div class="d-flex flex-column align-items-center justify-content-center text-center mb-5 wow slideInLeft" data-wow-delay="0.1s" style=" padding: 1rem;">
                        <h1 class="mb-3">Find a Property</h1>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">

                            <?php 
                                    $sql = "SELECT * from properties";
                                    $query = $dbh -> prepare($sql);
                                    $query->execute();
                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt=1;
                                    if($query->rowCount() > 0)
                                    {
                                    foreach($results as $result)
                                    {               ?>

                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="property-item rounded overflow-hidden">
                                    <div class="position-relative overflow-hidden">
                                        <a href="booking.php?propertyid=<?php echo htmlentities($result->id);?>"><img
                                                style="height: 300px; width: 100%;" class="img-fluid"
                                                src="admin/includes/uploads/<?php echo htmlentities($result->image);?>"
                                                alt="Image"></a>
                                    </div>
                                    <div class="p-4 pb-0">
                                        <a class="d-block h5 mb-2"
                                            href="booking.php?propertyid=<?php echo htmlentities($result->id);?>">
                                            <?php echo htmlentities($result->name);?></a>
                                            <li><?php echo htmlentities($result->address);?></li>
                                            <li></i>Bathrooms: <?php echo htmlentities($result->nobathrooms);?></li>
                                            <li></i>No of Bedrooms: <?php echo htmlentities($result->nobeds);?></li>
                                        <h6 class="text-primary mb-3 mt-2">Rs. <?php echo htmlentities($result->price);?></h6>
                                    </div>
                                </div>
                            </div>

                            <?php } }?>

                            <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                                <a class="btn btn-primary py-3 px-5 mb-5" href="my-bookings.php">My Requests</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php include('includes/footer.php'); ?>

    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
  $(document).ready(function(){
    $('.owl-carousel').owlCarousel({
      items:1,
      loop:true,
      autoplay:true,
      autoplaySpeed: 3000, 
      autoplayTimeout:3000,
      autoplayHoverPause:false
    });
  });
</script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>