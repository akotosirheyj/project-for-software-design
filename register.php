<?php
$lenovoLOQ="LAPTOP-3PS5SCD2\SQLEXPRESS"; 
$databaseCONNECT=[ 
"Database"=>"BUILDERSCO", 
"Uid"=>"", 
"PWD"=>"" 
]; 

$connect=sqlsrv_connect($lenovoLOQ, $databaseCONNECT); 

$fullname=$_POST['fullname'];
$email=$_POST['email'];
$username=$_POST['username'];
$password=$_POST['password'];

$checkuseremail="SELECT * FROM USERINFO WHERE EMAIL = '$email'";
$checkemail=sqlsrv_query($connect, $checkuseremail);

$checkusername="SELECT * FROM USERINFO WHERE USERNAME = '$username'";
$checkusername=sqlsrv_query($connect, $checkusername);

if (sqlsrv_has_rows($checkemail)) {
        // Redirect to your "Email Taken" frontend or show error
        header("Location: email_taken.php");
        exit();
        
    } else if (sqlsrv_has_rows($checkusername)) {
        // Redirect to your "Username Taken" frontend or show error
        header("Location: username_taken.php");
        exit();
    
    } else {
        // 3. Both are unique, so we proceed to Save
        $insertuserinfo = "INSERT INTO USERINFO (FULLNAME, EMAIL, USERNAME, PASSWORD) VALUES ('$fullname', '$email', '$username', '$password')";
        $resultuserinfo = sqlsrv_query($connect, $insertuserinfo);

        if($resultuserinfo) {
            header("Location: login.html");
            exit();
        }
    }
?>