<?php

echo '<p>Before Camera Restart...<p>';
$output=shell_exec('nohup /home/ubuntu/www/html/scripts/startrtsp restart > /dev/null 2>&1 &');
echo "<p>After Camera Restart, result=$output</p>";

?>
