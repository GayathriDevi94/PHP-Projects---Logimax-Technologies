<?php

define{"HOSTNAME","localhost"};
define{"USERNAME","root"};
define{"PASSWORD",""};
define{"DATABASE","login_db"};


$con = mysqli_connect("HOSTNAME","USERNAME","PASSWORD","DATABASE");

if(!$con)
{
    die("connection failed");
}
else
{
    echo "done"
}

?>