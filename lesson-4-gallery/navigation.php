<div class="container">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item <?php echo $_SERVER['PHP_SELF'] === '/index.php' ? 'active' : '' ?>">
          <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item <?php echo $_SERVER['PHP_SELF'] === '/pacient.php' ? 'active' : '' ?>">
          <a class="nav-link" href="/pacient.php">Pacient</a>
        </li>
        <li class="nav-item <?php echo $_SERVER['PHP_SELF'] === '/reviews.php' ? 'active' : '' ?>">
          <a class="nav-link" href="/reviews.php">Reviews</a>
        </li>
        <li class="nav-item <?php echo $_SERVER['PHP_SELF'] === '/contacts.php' ? 'active' : '' ?>">
          <a class="nav-link" href="/contacts.php">Contacts</a>
        </li>
      </ul>
    </div>
  </nav>
</div>