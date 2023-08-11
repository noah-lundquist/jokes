<head>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#accordion" ).accordion();
        } );
    </script>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serrif;
        }
    </style>
</head>

<?php

// connect to database
include "db_connect.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

//get the keyword from the URL
$keywordfromform = ["keyword"];
echo $keywordfromform;

$keywordfromform = "%" . $keywordfromform . "%";

// serch the database
echo "<h1>Show all jokes with the word $keywordfromform</h1>";


// query to get all jokes from the database
// replace the variables in the sql statement with question marks.
$stmt = $mysqli->prepare("
    SELECT JokeID, Joke_question, Joke_answer, users_table_id, username 
    FROM jokes_table 
    JOIN users_table 
    ON users_table.id = jokes_table.users_table_id 
    WHERE Joke_question LIKE ?");

$stmt->bind_param("s", $keywordfromform); // bind the variables seperatly to the question marks.

$stmt->execute(); // execute the query
$stmt->store_result(); // store the result from the query

$stmt->bind_result($JokeID, $Joke_question, $Joke_answer, $users_table_id, $username); // bind the result data to new variables

// if there are any results, then print them to the screen, else print 0 results
if ($stmt->num_rows > 0) {


    // output data of each row
    echo "<div id='accordion'>";
    while($row = $stmt->fetch()) {
        echo "<h3>" . $Joke_question . "</h3>";

        echo "<div><p>" . $Joke_answer . "-- Submitted by user " . $username . "</p></div>";


    }
    echo "</div>";
} else {
    echo "0 results";
}
?>
