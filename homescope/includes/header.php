<?php

error_reporting (E_ALL ^ E_NOTICE);
$page = basename($_SERVER['PHP_SELF']);

if(isset($_SESSION['uid'])){
    $uid=$_SESSION['uid'];
}
$sqls = "SELECT username from users where id=:uid";
$query = $dbh -> prepare($sqls);
$query -> bindParam(':uid',$uid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=count($results);
if($query->rowCount() > 0){
foreach($results as $result)
    {
        $uname=$result->username;
    }
} 

?>

<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<div class="container-fluid nav-bar bg-transparent sticky-top">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">

                <img class="img-fluid" src="includes/logo/ps.png" alt="Logo" style="height: 80px;">

                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="index.php" class="<?php if($page == 'index.php'){ echo ' nav-item nav-link active"';} else{ echo ' nav-item nav-link"';}?>">Home</a>
                        <a href="property-list.php" class="<?php if($page == 'property-list.php'){ echo ' nav-item nav-link active"';} else{ echo ' nav-item nav-link"';}?>">Property Finder</a>
                        <a href="about.php" class="<?php if($page == 'about.php'){ echo ' nav-item nav-link active"';} else{ echo ' nav-item nav-link"';}?>">Our Story</a>
                        <?php if(!$uid){ ?>
                        <a href="sign-in.php" class="<?php if($page == 'sign-in.php'){ echo ' nav-item nav-link active"';} else{ echo ' nav-item nav-link"';}?>">Sign In</a>
                        <a href='sign-up.php' class="<?php if($page == 'sign-up.php'){ echo ' nav-item nav-link active"';} else{ echo ' nav-item nav-link"';}?>">Sign Up</a>
                    </div>
                    <?php }else{?>
                </div>
                    <div class="col-md-2">
                    <div class="nav-item dropdown">
                    <a class="<?php if($page == 'profile.php'){ echo ' nav-item nav-link active"';} else{ echo ' nav-item nav-link"';}?>">My Profile</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="profile.php" class="dropdown-item">My Profile</a>
                                <a href="my-bookings.php" class="dropdown-item">My Rent Requests</a>
                                <a href="sign-in.php" class="dropdown-item active">Sign Out</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <br>
                </div>
                
            </nav>
        </div>