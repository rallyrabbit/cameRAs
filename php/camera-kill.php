<?php

echo '<p>Before Camera Shutdown...<p>';
$output=shell_exec('nohup /home/ubuntu/www/html/scripts/killrtsp > /dev/null 2>&1 &');
echo "<p>After Shutdown, result=$output</p>";

?>
