<?php
define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "login_db");

//establishing the database connection
$con = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DATABASE);
//validating the connection
if(!$con)
{
    die("connection failed");
}
else
{
    echo "yes";
}

?>