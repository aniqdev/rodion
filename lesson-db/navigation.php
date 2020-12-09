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
      </ul>
      <div class="my-2 my-lg-0">
        <?php if(isset($_SESSION['username'])): ?>
        <a href="?logout" class="btn btn-danger ml-3 logout-btn" style="float: right;"><i class="fa fa-times"></i></a>
        <h6 style="float: right;line-height: 30px;">Hello <?= $_SESSION['username']?></h6>
        <?php else: ?>
        <a class="nav-link" href="login.php">login</a>
        <?php endif; ?>
      </div>
    </div>
  </nav>
</div>