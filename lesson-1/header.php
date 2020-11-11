<!DOCTYPE html>
<html>
  <head>
    <title>Uebung5(1)_tabelle.php</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
.navbar-light .navbar-nav .active>.nav-link, .navbar-light .navbar-nav .nav-link.active{
    color: rgba(0,0,0,.9);
    color: #fff;
    background: #647cb3;
    border-radius: 8px;
}
    </style>
  </head>
  <body>
    <hr>
<div class="container">
  
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item <?php is_active(); ?>">
        <a class="nav-link" href="/lesson-1/">Home</a>
      </li>
      <li class="nav-item <?php is_active('pacient'); ?>">
        <a class="nav-link" href="/lesson-1/pacient.php">Pacient</a>
      </li>
      <li class="nav-item <?php is_active('reviews'); ?>">
        <a class="nav-link" href="/lesson-1/reviews.php">Reviews</a>
      </li>
      <li class="nav-item <?php is_active('contacts'); ?>">
        <a class="nav-link" href="/lesson-1/contacts.php">Contacts</a>
      </li>
    </ul>
  </div>
</nav>

<?php 
function is_active($page = 'index')
{
  // echo $_SERVER['PHP_SELF'] === '/lesson-1/'.$page.'.php' ? 'active' : '';

  // if ($_SERVER['PHP_SELF'] === '/lesson-1/'.$page.'.php') {
  //   echo "active";
  // }else{
  //   echo "";
  // }

  if ($_SERVER['PHP_SELF'] === '/lesson-1/'.$page.'.php') {
    echo "active";
  }
}
?>