<?php

session_start();
include('includes/config/dbconn.php');

$sql = "SELECT * FROM properties WHERE status='Approved';";
$stmt = $dbh->query($sql);

$properties = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo '<script>';
echo 'var properties = ' . json_encode($properties) . ';';
echo '</script>';

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
    <div class="container-xxl bg-white p-0">

        <?php include('includes/header.php'); ?>

        <?php                    
        
        if(isset($_SESSION['error'])){

            ?>

                    <br>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Notice: </strong> <?php echo $_SESSION['error']; ?>
                        </button>
                    </div>

                    <?php
            unset($_SESSION['error']);

        }
        ?>

        <div class="container-xxl py-5">
            <div class="container-xxl">

                <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBI7hQ4AOd1FT3tr5MtUmfYFMty12BsR0s&callback=initMap&libraries=maps,marker&v=beta"></script>

            <div class="container-xxl">
                <div class="container-xxl">
                    <div class="row g-5 align-items-center" style="margin-top: 1px; overflow: hidden;">
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                            <div class="position-relative overflow-hidden p-5 pe-0" style="margin-top: -6rem;">
                                <div id="map" style="width: 100%; height: 400px; padding-bottom: 20px;"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeIn" style="margin-top: 0;" data-wow-delay="0.5s">
                            <h1 class="mb-4">Find your property</h1>
                            <p class="mb-4">Welcome to HomeScope, your go-to platform for finding accommodation near NSBM University! We understand the importance of comfortable and convenient living arrangements, especially for students embarking on their academic journey. Our platform is designed to simplify the process of finding the perfect place to call home during your time at NSBM.</p>
                            <p class="mb-4"> At HomeScope, we curate a list of verified accommodation options, ensuring that each listing meets our quality standards. Whether you're looking for a shared apartment, a private room, or a homestay, we have a range of options to suit your needs and budget. Our user-friendly interface allows you to easily browse through available listings, view photos, read reviews from previous tenants, and connect directly with landlords. Say goodbye to the stress of house hunting and let HomeScope help you find your ideal accommodation near NSBM University!</p>
                            <p class=" mt-3 mb-5 text-primary">Find a property from the map or scroll down to browse properties</p>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                function initMap() {
                    var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 14,
                        center: {lat: 6.821520805358887, lng: 80.04154968261719}
                    });

                    for (var i = 0; i < properties.length; i++) {
                        var property = properties[i];
                        var marker = new google.maps.Marker({
                            position: {lat: parseFloat(property.latitude), lng: parseFloat(property.longitude)},
                            map: map
                        });

                        (function (property) {
                            var contentString = '<div id="content">' +
                                '<div id="siteNotice">' +
                                '</div>' +
                                '<h6 id="firstHeading" class="firstHeading">' + property.name + '</h6>' +
                                '<div id="bodyContent">' +
                                '<p><b>Rs. ' + property.price + ' Per Month</p>' +
                                '<p><b>Address:</b> ' + property.address + '</p>' +
                                '<p><b>No of Bedrooms:</b> ' + property.nobeds + '</p>' +
                                '<p><b>No of Bathrooms:</b> ' + property.nobathrooms + '</p>' +
                                '</div>' +
                                '</div>';

                            var infoWindow = new google.maps.InfoWindow({
                                content: contentString
                            });

                            marker.addListener('click', function () {
                                infoWindow.open(map, this);
                            });
                        })(property);
                            }
                        }
            </script>

                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            <?php 
                                    $sql = "SELECT * from properties WHERE status='Approved'";
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
                                <a class="btn btn-primary py-3 px-5" href="my-bookings.php">My Requests</a>
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
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>