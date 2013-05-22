<?php
/**
 * 
 * 
 */

// database settings
$server = "localhost";
$username = "stridebird";
$password = "stridebird";
$database = "votewidget";

mysql_connect($server, $username, $password) or die("database connect failed");

mysql_select_db($database) or die("could not open database $database");

