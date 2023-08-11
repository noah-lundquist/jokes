<?php
session_start();


error_reporting(E_ALL);
ini_set('display_errors', 1);


// connect to database
include "db_connect.php";

//get the keyword from the URL
$username = addslashes($_POST["username"]);
$password = $_POST["password"];


// query to get all jokes from the database
$stmt = $mysqli->prepare("SELECT id, username, password FROM users_table where username = ?"); // replace the variables in the sql statement with question marks.
$stmt->bind_param("s", $username); // bind the variables seperatly to the question marks.


$stmt->execute(); // execute the query
$stmt->store_result(); // store the result from the query

$stmt->bind_result($userid, $uname, $pw); // bind the result data to new variables
if ($stmt->num_rows == 1){
    $stmt->fetch();
    if (password_verify($password, $pw)){
        echo "Login Successful <br>";
        $_SESSION['username'] = $uname;
        $_SESSION['userid'] = $userid;
        exit;
    }
    else {
        $_SESSION = [];
        session_destroy();
    }

}
else {
    $_SESSION = [];
    session_destroy();
}
echo "Login failed";
echo "SESSION = <br>";
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

echo "<br><a href='login_form.php'>Back to login</a>";
?>

