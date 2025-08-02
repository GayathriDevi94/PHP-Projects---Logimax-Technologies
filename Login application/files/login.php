<?php 
    include('dbcon.php');
?>
<?php
    //starting the session
    session_start();
?>
<?php
    // print_r("hi");
    //validating whether the login holds any value
    if(isset($_POST['login']))
    {
        // echo "ho";
        $username = $_POST['uname'];
        $password = $_POST['upass'];
    }
    //getting the datas from the database based on the username and password
    $query = "select * from `user_details` where `user_name` = '$username' and `user_pass` = '$password'";
    // echo $query;
    //querying the database
    $result = mysqli_query($con,$query);
    //getting the values
    $temp = mysqli_fetch_assoc($result);
    //storing the values in session
    $_SESSION['mobile_no'] = $temp["user_phone_no"];
    $_SESSION['gender'] = $temp["Gender"];
    // print_r($temp);
    //validating the query based on database details
    if(!$result){
        // echo "hi";
        die("Query Failed".mysqli_error());
    }
    else{
        // echo 3;
        // print_r($result);
        $row = mysqli_num_rows($result);
        if($row == 1)
        {
            // echo 1;
            $_SESSION['uname'] = $username;
            
            header('location:../files/home.php');
        }
        else
        {
            header('location:../index.php ?message=Sorry your username or email id is invalid');
        }
    }
?>