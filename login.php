<?php
$lenovoLOQ="LAPTOP-3PS5SCD2\SQLEXPRESS"; 
$databaseCONNECT=[ 
"Database"=>"BUILDERSCO", 
"Uid"=>"", 
"PWD"=>"" 
]; 

$connect=sqlsrv_connect($lenovoLOQ, $databaseCONNECT); 

$UserEntry=$_POST['UserEntry'];
$UserPassword=$_POST['UserPassword'];

$checkentry = "SELECT * FROM USERINFO WHERE USERNAME = '$UserEntry' OR EMAIL = '$UserEntry'";
$resultentry = sqlsrv_query($connect, $checkentry);

// 2. The "If Data Exists" check
if (!sqlsrv_has_rows($resultentry)) {
    // DATA DOES NOT EXIST: Redirect to your "not found" page
    header("Location: user_not_found.php");
    exit();
} else {
    // DATA EXISTS: Now fetch the row to check the password
    $row = sqlsrv_fetch_array($resultentry, SQLSRV_FETCH_ASSOC);
    
    if ($row['PASSWORD'] == $UserPassword) {
        // SUCCESS: Redirect to the feed
        header("Location: feed.html");
        exit();
    } else {
        // WRONG PASSWORD: Redirect to your password error page
        header("Location: wrong_password.php");
        exit();
    }
}
?>


?>
