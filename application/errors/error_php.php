<?php

echo "<div style=\"border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;\">\r\n\r\n<h4>A PHP Error was encountered</h4>\r\n\r\n<p>Severity: ";
echo $severity;
echo "</p>\r\n<p>Message:  ";
echo $message;
echo "</p>\r\n<p>Filename: ";
echo $filepath;
echo "</p>\r\n<p>Line Number: ";
echo $line;
echo "</p>\r\n\r\n</div>";

?>