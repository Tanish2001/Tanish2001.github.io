<?php
session_start();
include("connect.php");

$mobile = $_POST['mobile'];
$password = $_POST['password'];
$role = $_POST['role'];

$check = mysqli_query($connect,"SELECT* FROM user where mobile = '$mobile' and password = '$password' AND role='$role' ");

if(mysqli_num_rows($check)>0){
    $userdata = mysqli_fetch_array($check);
    $groups = mysqli_query($connect, "SELECT * FROM user where role=2");
    $groupsdata = mysqli_fetch_all($groups, MYSQLI_ASSOC);

    $_SESSION['userdata'] = $userdata;
    $_SESSION['groupsdata']= $groupsdata;

    echo ' 
    <script>
        window.location = "../routes/dashboard.php";
    </script>
    ';
}

else{
    echo ' 
    <script>
        alert("User not Found");
        window.location = "../";
    </script>
    ';
}
?>