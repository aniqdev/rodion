<div class="container">
  <nav class="container navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item <?php echo @$_GET['action'] === 'profile' ? 'active' : '' ?>">
          <a class="nav-link" href="?action=profile&id=<?= $_SESSION['user']['id'] ?>" title="My profile">Profile</a>
        </li>
        <li class="nav-item <?php echo @$_GET['action'] === 'userAdministration' ? 'active' : '' ?>">
          <a class="nav-link" href="index.php?action=userAdministration">Users</a>
        </li>
        <li class="nav-item <?php echo @$_GET['action'] === 'chat' ? 'active' : '' ?>">
          <a class="nav-link" href="index.php?action=chat">Chat</a>
        </li>
      </ul>

      <form class="d-flex" method="GET" action="index.php">
        <input type="hidden" name="action" value="search">
        <input name="query" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>

      <div class="d-flex">
        <?php if(isset($_SESSION['user'])): ?>
        <div style="padding: .375rem .75rem;">Hello <?= $_SESSION['user']['username']?>[<?= $_SESSION['user']['id']?>]</div>
        <a href="?logout" class="btn btn-danger ms-2 logout-btn"><i class="fa fa-times" style="line-height: 20px;"></i></a>
        <?php else: ?>
        <a class="nav-link" style="float: right" href="login.php">login</a>
        <a class="nav-link" style="float: right" href="register.php">register</a>
        <?php endif; ?>
      </div>
    </div>
  </nav>
</div>