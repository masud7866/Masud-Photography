<?php
setcookie("php_session","",time()-100,"/");
header("location: index.php");
?>