<!-- @todo add class "active" to active link-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/index.php">Logo- home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page"
                       href="/products.php">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/cart.php">Cart</a>
                </li>
              <?php if (isset($_SESSION["loggedin"], $_SESSION['is_admin']) && $_SESSION["loggedin"] === TRUE && $_SESSION['is_admin'] === 1) { ?>
                  <li class="nav-item">
                      <a class="nav-link" href="/admin-dashboard.php"
                         tabindex="-1" aria-disabled="true">Admin dashboard</a>
                  </li>
              <?php } ?>
            </ul>

          <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === TRUE) {
            $username_query = "select first_name, last_name from users where users.user_id = " . $_SESSION['id'];
            $name_result = $mysql->query($username_query)->fetch_assoc();
            $fullname = $name_result['first_name'] . ' ' . $name_result['last_name']; ?>
              <ul class="navbar-nav ms-auto">
                  <li class="nav-item">
                      <p class="nav-link">Hello <?php echo $fullname ?>!</p>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="/user-page.php">My profile</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="/logout.php">Logout</a>
                  </li>
              </ul>

          <?php }
          else { ?>
              <ul class="navbar-nav ms-auto">
                  <li class="nav-item">
                      <a class="nav-link" href="/login.php">Login</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="/register.php">Register</a>
                  </li>
              </ul>
          <?php } ?>
        </div>
    </div>
</nav>