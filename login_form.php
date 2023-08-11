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
<h1>Login For Jokes App</h1>

<?php

include "db_connect.php";

?>

<!--Search for a keyword form-->
<form class="form-horizontal" action="process_login_unsecure.php" method="post">
    <fieldset>

        <!-- Form Name -->
        <legend>Please login</legend>

        <!-- Search input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="username">Username</label>
            <div class="col-md-5">
                <input id="username" name="username" type="text" placeholder="Enter your username..." class="form-control input-md" required="">
                <p class="help-block">Enter the username that you signed up with....</p>
            </div>
        </div>

        <!-- Search input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="password">Password</label>
            <div class="col-md-5">
                <input id="password" name="password" type="password" placeholder="Enter your password..." class="form-control input-md" required="">
                <p class="help-block">Enter your super secret password....</p>
            </div>
        </div>

        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="submit"></label>
            <div class="col-md-4">
                <button id="submit" name="submit" class="btn btn-success">Login</button>
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

