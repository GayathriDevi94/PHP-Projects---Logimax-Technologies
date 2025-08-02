<?php
    if(!isset($_SESSION)) {
        session_start();
    }  
?>
<!DOCTYPE html>
<html Lang="en"›
    ‹head>
        <meta charset="UTF-8">
        <!-- <title>My Application </title> -->
        <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap-5.3.7-dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap-5.3.7-dist/css/style.css">
        <div style="clear: both">
            <h2 style="float: left"><?php echo $_SESSION['uname'] ?></h2>
            <h3 style="float: right">Logout</h3>
        </div>
    </head>
    <!-- <body> -->
    
        <!-- <div >
            <p><php echo $_SESSION['uname'] ?></p>
            <p style="text-align:right;">Logout</p>
        </div>
        <div class="text-container-new"> -->
            <!-- <p style="text-align:right;"> -->
        <!-- <h1 style="text-align:Left;" ><php echo $_SESSION['uname'] ?></h1> -->
        <!-- <h1 style="text-align:Right;" >Logout </h1> -->
<!-- </p> -->
<!-- </div> -->
    <!-- </body> -->
</html>