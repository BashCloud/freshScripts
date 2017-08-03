<?php
$server   = "localhost"; // Edit this
$database = "database"; // Edit this
$username = "user"; // Edit this
$password = "password"; // Edit this

$mysqlConnection = mysql_connect($server, $username, $password);
if (!$mysqlConnection)
{
  echo "Please try later.";
}
else
{
mysql_select_db($database, $mysqlConnection);
echo "Success.";
}
?>
