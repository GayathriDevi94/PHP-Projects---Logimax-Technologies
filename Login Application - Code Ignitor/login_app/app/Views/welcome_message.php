<!-- Loging Page UI -->
<!DOCTYPE html>
<html Lang="en"›
    ‹head>
        <meta charset="UTF-8">
        <title>My Application - Code Ignitor</title>
        <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap-5.3.7-dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap-5.3.7-dist/css/style.css">
    </head>
    <body>
        <h1>LOGIN APPLICATION</h1>
        <div class="container">
            <?php
            //getting the message whether the user logged in successfully or not
            if(isset($_GET['message']))
            {
                echo "<h4>".$_GET['message']."</h4>";
            }

            ?>
            <form class="form" action="files/login.php" method="post">
                <div class="form-group">
                    <label for="uname" >Username</label>
                    <input type="text" name="uname" cLass="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="upass" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" name="login" value="Login" cLass="btn btn-success">
                </div>
            </form> 
        </div>
    </body> 
</html>