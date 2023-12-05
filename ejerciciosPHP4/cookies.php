<?php
$politica="ACCEPT";
$cache="ACCEPT";
$datos="ACCEPT";
setcookie("Politic",$politica,time()+10*60);
setcookie("Cache",$cache,time()+10*60);
setcookie("Data",$datos,time()+10*60);
echo "<p><b>Cookie Política:</b> ".$_COOKIE["Politic"]."</p>";
echo "<p><b>Cookie Caché:</b> ".$_COOKIE["Cache"]."</p>";
echo "<p><b>Cookie Datos:</b> ".$_COOKIE["Data"]."</p>";

?>