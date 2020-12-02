<div class="container">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item <?php echo $_SERVER['PHP_SELF'] === '/index.php' ? 'active' : '' ?>">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item <?php echo $_SERVER['PHP_SELF'] === '/userAdministration.php' ? 'active' : '' ?>">
          <a class="nav-link" href="userAdministration.php">userAdministration</a>
        </li>
        <li class="nav-item <?php echo $_SERVER['PHP_SELF'] === '/login.php' ? 'active' : '' ?>">
          <a class="nav-link" href="login.php">login</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <h6>Hello <?= $_SESSION['username']?></h6>
      </form>
    </div>
  </nav>
</div>