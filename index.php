<?php
include_once 'includes/session.php';
include_once 'includes/checkIfAdmin.php' ?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0"
          crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>
<?php include_once 'includes/navigation.php' ?>
<div class="px-4 py-5 my-5 text-center" id="welcome-text">
    <h1>Hello there</h1>
    <p class="lead">Welcome to our wine e-shop website! <br> Here you can find a lot of wine
        options for the best occasion </p>
    <p class="lead">In order to use our website, you have to create an account <a
                href="register.php">here</a> or <a href="login.php">login.</a>
    </p>
    <p class="lead">You can find our products <a href="products.php">here!</a></p>
</div>


<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8"
        crossorigin="anonymous"></script>
</body>
</html>
