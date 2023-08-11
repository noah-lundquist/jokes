<html>
<head>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<h1>Jokes Page</h1>

<a href="login_form.php">Click here to login</a><br>
<a href="register.php">Click here to register</a><br>


<?php

include "db_connect.php";

?>

<!--Search for a keyword form-->
<form class="form-horizontal" action="search_keyword.php">
    <fieldset>

        <!-- Form Name -->
        <legend>Search For A Joke</legend>

        <!-- Search input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="keyword">Search Input</label>
            <div class="col-md-5">
                <input id="keyword" name="keyword" type="search" placeholder="e.g. chicken pot pie" class="form-control input-md" required="">
                <p class="help-block">Enter a word to search for....</p>
            </div>
        </div>

        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="submit"></label>
            <div class="col-md-4">
                <button id="submit" name="submit" class="btn btn-success">Search</button>
            </div>
        </div>

    </fieldset>
</form>


<hr>

<!--Add a joke form-->
<form class="form-horizontal" action="/add_joke.php">
    <fieldset>

        <!-- Form Name -->
        <legend>Add A Joke</legend>

        <!-- Search input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="newjoke">Joke question</label>
            <div class="col-md-6">
                <input id="newjoke" name="newjoke" type="search" placeholder="" class="form-control input-md" required="">
                <p class="help-block">Enter the first half of your joke...</p>
            </div>
        </div>

        <!-- Search input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="jokeanswer">Joke punch line</label>
            <div class="col-md-6">
                <input id="jokeanswer" name="jokeanswer" type="search" placeholder="" class="form-control input-md" required="">
                <p class="help-block">Enter the punch line of your new joke...</p>
            </div>
        </div>

        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="submit"></label>
            <div class="col-md-4">
                <button id="submit" name="submit" class="btn btn-success">Add new joke</button>
            </div>
        </div>

    </fieldset>
</form>
<?php

// close sql stream
$mysqli->close();
?>
</body>

</html>

