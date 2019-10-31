<?php
mysql_connect("localhost","root") or die(mysql_error());
echo "Connection to the server was successful";
$dbasename="employeedetails";
mysql_select_db($dbasename)or die(mysql_error());
echo "Database is selected";
mysql_close();
?>