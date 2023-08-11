<?php

include "db_connect.php";

$new_username = addslashes($_GET["username"]);
$new_password1 = addslashes($_GET["password1"]);
$new_password2 = addslashes($_GET["password2"]);

// check if the passwords match
if ($new_password1 != $new_password2) {
    echo "Passwords do not match... Try again!";
    exit;
}

preg_match("^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$^", $new_password1, $matches);
if (sizeof($matches) == 0) {
    echo "The password must have Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character!<br>";
    exit;
}

preg_match("^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$^", $new_password2, $matches);
if (sizeof($matches) == 0) {
    echo "The password must have Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character!<br>";
    exit;
}
$hashed_password = password_hash($new_password1, PASSWORD_DEFAULT);
// check for existing user
$sql = "SELECT * FROM users_table WHERE username = '$new_username'";
$result = $mysqli->query($sql) or die(mysqli_error($mysqli));

if ($result->num_rows > 0) {
    echo "The username " . $new_username . " already exists, try again.";
    exit;
}
// query to get all jokes from the database
$stmt = $mysqli->prepare("INSERT INTO users_table (id, username, password) VALUES (null, ?, ?)"); // replace the variables in the sql statement with question marks.
$stmt->bind_param("ss", $new_username, $hashed_password); // bind the variables seperatly to the question marks.

$result = $stmt->execute(); // execute the query


// check if registration was successful or not
if ($result) {
    echo "Registration success ";
} else {
    echo "Registration failure ";
}

echo "<a href='index.php'>Return to the main page</a>";
?>