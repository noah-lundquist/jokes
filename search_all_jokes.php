<?php
// if there are no values in the table, display error message
if ($mysqli->connect_errno) {
    echo "Failed to connect to MYSQL: (" . $mysqli->connect_errno;
}

// display the gost info
echo $mysqli->host_info . "<br>";

// query to get all jokes from the database
$sql = "SELECT JokeID, Joke_question, Joke_answer FROM jokes_table";

// storing result of query in result
$result = $mysqli->query($sql);

// if there are any results, then print them to the screen, else print 0 results
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<h1>" . $row['Joke_question'] . "</h1>";

        echo "<div><p>" . $row['Joke_answer'] . " submitted by usr # " . $row['users_table_id'] ."</p></div>";
    }
} else {
    echo "0 results";
}

?>