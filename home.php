<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page!!</title>
    <link rel="stylesheet" href="assets/css/nav.css">
    <link rel="stylesheet" href="assets/css/home.css">
    <script src="https://kit.fontawesome.com/118a820504.js" crossorigin="anonymous"></script>
    
</head>
<body>
    <div class="dashboard-container">
        <div class="nav left-right-margin">
            <div class="logo">
                <h3>Real Estate Property</h3>
            </div>
            <div class="list">
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <!-- <li><a href="activity.php">Activities</a></li> -->
                    <li>
                        <?php if(isset($_SESSION['email'])) echo "<div class='logout'><a href='logout.php'>Log out</a></div>"; ?>
                        <?php if(!isset($_SESSION['email'])) echo "<div class='logout'><a href='login.php'>Log in</a></div>"; ?>
                    </li>
                </ul>
            </div>
            <div class="user_detail">
                <div class="email">
                    <i class="fa-solid fa-user"></i>
                    <?php if(isset($_SESSION['email'])) echo $_SESSION['email']; ?>
                    (<?php if(isset($_SESSION['name'])) echo $_SESSION['name']; ?>)
                </div>
            </div>
        </div>
    </div>  
</body>
</html>