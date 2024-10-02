<?php

session_start();
unset($_SESSION['uid']);

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

    <!-- Libraries -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <?php include('includes/header.php'); ?>

    <div class="container-fluid overflow-hidden mb-8" style="min-height: -webkit-fill-available; margin-bottom: 2.5rem">
        <?php                    
          
                      if(isset($_SESSION['success'])){

                        ?>

        <br>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Notice: </strong> <?php echo $_SESSION['success']; ?>
            </button>
        </div>

        <?php
                        unset($_SESSION['success']);

                    }

              if(isset($_SESSION['error'])){

              ?>

        <br>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Notice: </strong> <?php echo $_SESSION['error']; ?>
            </button>
        </div>

        <?php
              unset($_SESSION['error']);

              }
              ?>

        <div class="row h-100 align-items-center justify-content-center overflow-hidden">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="rounded p-4 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <img class="navbar-brand mx-4 mb-3" src="includes/logo/ps.png" alt="DriveNow"
                            style="width: 240px;">
                    </div>

                    <form action="includes/loginHandler.php" method="post">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" id="floatingInputEmail"
                                placeholder="name@example.com" required>
                            <label for="floatingInputEmail">Email address</label>
                        </div>

                        <hr>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password" id="floatingPassword"
                                placeholder="Password" required>
                            <label for="floatingPassword">Password</label>
                        </div>


                        <div class="d-grid mb-8">
                            <button class="btn btn-primary m-2" name="signin" type="submit">Submit</button>
                            <a class="btn btn-primary m-2" href="admin/signin.php">Admin Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>

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