<?php

// include db config file
require_once 'includes/db-config.php';

// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
$first_name = $first_name_err = $last_name = $last_name_err = '';

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {

  // Make sure a username exists in the form.
  if (empty(trim($_POST["username"]))) {
    $username_err = "Please enter a username.";
  }
  else {
    $username = trim($_POST["username"]);
    // There is a username. Validate it.
    // Prepare a select statement.
    $sql = "SELECT user_id FROM users WHERE username = $username";

    // Attempt to execute the prepared SQL statement
    if ($result = $mysql->query($sql)) {

      //get results.
      $results = $result->fetch_all();


      if (count($results) !== 0) {
        // It seems the username is taken, return an error.
        $username_err = "This username is already taken.";
      }

      $result->close();
    }
    else {
      echo "Oops! Something went wrong. Please try again later.";
    }
  }

  // Validate password
  if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter a password.";
  }
  elseif (strlen(trim($_POST["password"])) < 6) {
    $password_err = "Password must have at least 6 characters.";
  }
  else {
    $password = trim($_POST["password"]);
  }

  // Validate confirm password
  if (empty(trim($_POST["confirm_password"]))) {
    $confirm_password_err = "Please confirm password.";
  }
  else {
    $confirm_password = trim($_POST["confirm_password"]);
    if (empty($password_err) && ($password !== $confirm_password)) {
      $confirm_password_err = "Password did not match.";
    }
  }

  if (empty(trim($_POST["first_name"]))) {
    $first_name_err = "Please insert your first name";
  }
  else {
    $first_name = trim($_POST["first_name"]);
  }

  if (empty(trim($_POST["last_name"]))) {
    $last_name_err = "Please insert your first name";
  }
  else {
    $last_name = trim($_POST["last_name"]);
  }

  // If there are no errors, insert user to the database
  if (empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($first_name_err) && empty($last_name_err)) {


    //Prepare variables for the SQL query.
    // $username, $first_name & $last_name is already set
    $password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

    if ($username === 'adminstrator@example.com') {
      $is_admin = 1;
    }
    else {
      $is_admin = 0;
    }

    // Prepare an insert statement
    $sql = "INSERT INTO users (username, password, first_name, last_name, is_admin) VALUES ($username, $password, $first_name, $last_name, $is_admin)";

    // Attempt to execute the prepared statement
    if ($mysql->query($sql)) {
      // User has been created. Redirect to login.
      header('location: login.php');
    }
    else {
      echo "Oops! Something went wrong. Please try again later.";
    }
  }

  // Close connection
  $mysql->close();
}
?>

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
    <link href="css/common.css" rel="stylesheet">
    <title>Register to the system</title>
</head>
<body>
<?php require_once 'includes/navigation.php' ?>

<div class="wrapper">
    <h2>Sign Up</h2>
    <p>Please fill this form to create an account.</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
          method="post">
        <div class="form-group">
            <label>E-mail
                <input type="email" name="username" required
                       class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>"
                       value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </label>
        </div>
        <div class="form-group">
            <label>Password
                <input type="password" name="password" required
                       class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>"
                       value="<?php echo $password; ?>">
            </label>
            <span class="invalid-feedback"><?php echo $password_err; ?></span>
        </div>
        <div class="form-group">
            <label>Confirm Password
                <input type="password" name="confirm_password" required
                       class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>"
                       value="<?php echo $confirm_password; ?>">
            </label>
            <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
        </div>
        <div class="form-group">
            <label>First name
                <input type="text" name="first_name" required
                       class="form-control <?php echo (!empty($first_name_err)) ? 'is-invalid' : ''; ?>"
                       value="<?php echo $first_name; ?>">
            </label>
            <span class="invalid-feedback"><?php echo $first_name_err; ?></span>
        </div>
        <div class="form-group">
            <label>Last name
                <input type="text" name="last_name" required
                       class="form-control <?php echo (!empty($last_name_err)) ? 'is-invalid' : ''; ?>"
                       value="<?php echo $last_name; ?>">
            </label>
            <span class="invalid-feedback"><?php echo $last_name_err; ?></span>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Submit">
            <input type="reset" class="btn btn-secondary ml-2" value="Reset">
        </div>
        <p>Already have an account? <a href="login.php">Login here</a>.</p>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8"
        crossorigin="anonymous"></script>
</body>
</html>