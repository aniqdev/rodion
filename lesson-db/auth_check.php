<?php

session_start();

if (!isset($_SESSION['logged']) || $_SESSION['logged'] == null) {
    header("Location: login.php"); 
    die;
}

?>
<pre>
<?php

// print_r($_SESSION);

?>
</pre>