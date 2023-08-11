<?php
session_start();


if (!$_SESSION['username']) {
    echo "Only logged-in users can access this page. Click <a href='jokes_app/login_form.php'>Here</a>";
    exit;
}

// connect to database
include "db_connect.php";

//get the new joke and punchline from the URL
$new_joke_question = addslashes($_GET["newjoke"]);
$new_joke_punch_line = addslashes($_GET["jokeanswer"]);

$userid = $_SESSION['userid'];

// serch the database
echo "<h2>Trying to add a new joke: " . $new_joke_question . " and " . $new_joke_punch_line . "</h2>";
// query to get all jokes from the database

$stmt = $mysqli->prepare("
    INSERT INTO jokes_table (JokeID, Joke_question, Joke_answer, users_table_id)
    VALUES (null, ?, ?, ?)");

$stmt->bind_param("ssi", $new_joke_question, $new_joke_punch_line, $userid); // bind the variables seperatly to the question marks.

$stmt->execute(); // execute the query

$stmt->close();

include "search_all_jokes.php";

echo "<a href='jokes_app/index.php'>Return to main menu</a><br>";

?>
