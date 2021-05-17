<?php
require_once 'includes/session.php';
require_once 'includes/db-config.php';
require_once 'includes/checkIfAdmin.php';

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
    <title>Orders - Admin overview</title>
</head>
<body>
<?php require_once 'includes/navigation.php';
if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === 1) {
  $sql = "SELECT * from orders";

  if ($result = $mysql->query($sql)) {
    if ($result->num_rows > 0) { ?>
            <h1>All orders</h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Order Id</th>
                <th scope="col">User</th>
                <th scope="col">Order Status</th>
                <th scope="col">Products</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($result as $row) {
              $username_query = "select first_name, last_name from users where users.user_id = " . $row['user_id'];
              $name_result = $mysql->query($username_query)->fetch_assoc();
              $fullname = $name_result['first_name'] . ' ' . $name_result['last_name'];
              echo "<tr>";
              echo "<th scope='row'>" . $row['order_id'] . "</th>";
              echo "<td>$fullname</td>";
              echo "<td>" . $row['status'] . "</td>";
              echo "<td>" . $row['products'] . "</td>"; // @todo get product names from product_ids
              echo "</tr>";
            }
            ?>

            </tbody>
        </table>
      <?php
    }
    else {
      echo "<h1>There are no orders yet.</h1>";
    }
  } ?>
<!--@todo show all products-->
<?php }
else {
  echo '<div class="alert alert-danger">You are not allowed to visit this page!</div>';
}
?>

</body>
</html>
