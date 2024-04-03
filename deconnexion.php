<?php
session_start();
session_destroy();

echo "<script type='text/javascript'>alert('Vous vous êtes déconnecté'); document.location.href = 'index.php'</script>";

?>