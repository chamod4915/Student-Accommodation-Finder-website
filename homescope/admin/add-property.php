<?php
session_start();
include('../includes/config/dbconn.php');


if(strlen($_SESSION['aid'])==NULL){
    header('location:signin.php');
}

if(isset($_SESSION['aid'])){
    $userID=$_SESSION['aid'];

    $sql ="SELECT userType FROM users WHERE id=$userID";
    $query= $dbh -> prepare($sql);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);

    $_SESSION['AdminUserType'] = 'Admin';

    if($query->rowCount() > 0)
    {
        foreach ($results as $result) {
            $userType = $result->userType;
            $_SESSION['AdminUserType'] = $userType;
        }
    }
}

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
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <!-- Spinner -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>


        <!-- Sidebar -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">

                <img class="navbar-brand mx-4 mb-3" src="includes/logo/ps.png" alt="DriveNow"
                    style="width: 180px; height: 50px;">
                <div class="navbar-nav w-100">
                    <a href="dashboard.php" class="nav-item nav-link"><i
                            class="fa fa-cubes me-2"></i>Dashboard</a>
                            <?php if(isset($_SESSION['AdminUserType']) && $_SESSION['AdminUserType'] != 'Landlord') { ?>
                                <a href="manage-users.php" class="nav-item nav-link"><i class="fa fa-user me-2"></i>Manage
                                Users</a>
                            <?php } ?>
                        <a href="manage-properties.php" class="nav-item nav-link active"><i class="fa fa-home me-2"></i>Manage Property</a>
                    <a href="manage-bookings.php" class="nav-item nav-link"><i class="fa fa-book me-2"></i>Manage
                        Bookings</a>   
                </div>
            </nav>
        </div>


        <div class="content">
            <!-- Navbar -->
            <nav class="navbar navbar-expand bg-light sticky-top px-4 py-0">
                <img class="navbar-brand d-flex d-lg-none me-4" src="includes/logo/ps.png" alt="DriveNow"
                    style="width: 180px; height: 50px;">
                </a>
                <div class="navbar-nav align-items-center ms-auto">

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt=""
                                style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">My Account</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                        <a href="dashboard.php" class="dropdown-item">Dashboard</a>
                        <?php if(isset($_SESSION['AdminUserType']) && $_SESSION['AdminUserType'] != 'Landlord') { ?>
                                <a href="manage-users.php" class="dropdown-item">Manage
                                Users</a>
                            <?php } ?>
                            <a href="manage-properties.php" class="dropdown-item">Manage Properties</a>
                            <a href="manage-bookings.php" class="dropdown-item">Manage Rent Requests</a>
                            <a href="signin.php" class="dropdown-item">Sign Out</a>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="container-xxl bg-white p-0">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-xl-9 mx-auto">
                            <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
                                <div class="card-img-left d-none d-md-flex">
                                </div>
                                <div class="card-body p-4 p-sm-5">
                                    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s"
                                        style="max-width: 600px;">
                                        <h1 class="mb-3">Add New Property</h1>
                                    </div>


                                    <form action="includes/addpropertyHandler.php" method="post"
                                        enctype="multipart/form-data">

                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="name" required>
                                            <label>Property Name</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="address" required>
                                            <label>Address</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" name="squarefeet" required>
                                            <label>Square Feet</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" name="nobeds" required>
                                            <label>No of Bedrooms</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" name="nobathrooms" required>
                                            <label>No of Bathrooms</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" name="price" required>
                                            <label>Property Price</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="latitude">
                                            <label>Location Latitude</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="longitude">
                                            <label>Location Longitude</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input class="form-control" style="width: 350px;" type="file" name="file">
                                            <label>Upload Image</label>
                                        </div>

                                        <hr>

                                        <div class="d-grid mb-2">
                                            <button class="btn btn-success m-2" name="add" type="submit">Submit</button>
                                        </div>

                                        <hr class="my-4">

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/chart/chart.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/tempusdominus/js/moment.min.js"></script>
        <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
        <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="js/main.js"></script>
</body>

</html>