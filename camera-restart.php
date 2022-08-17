<?php
echo '<p>Before Camera Shutdoiwn...<p>';
$output=shell_exec('nohup /home/ubuntu/www/killrtsp > /dev/null 2>&1 &');
echo "<p>After Shutdown, result=$output</p>";

echo '<p>Before Camera Restart...<p>';
$output=shell_exec('nohup /home/ubuntu/www/rtspcron > /dev/null 2>&1 &');
echo "<p>After Camera Restart, result=$output</p>";

?>
