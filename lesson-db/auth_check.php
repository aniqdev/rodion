<?php

session_start();

if (isset($_GET['logout'])) {
	unset($_SESSION['username']);
    header("Location: login.php"); 
    die;
}

if (!isset($_SESSION['username'])) {
    header("Location: login.php"); 
    die;
}

?>
<pre>
<?php

// print_r($_SESSION);

?>
</pre>