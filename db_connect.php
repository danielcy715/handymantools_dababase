<?php
/**
 * These are the database login details
 */  
define("HOST", "localhost");     // The host you want to connect to.
define("USER", "root");    // The database username. 
define("PASSWORD", "123456");    // The database password. 
define("DATABASE", "handymantools");    // The database name.

$conn = new mysqli(HOST, USER, PASSWORD, DATABASE);
?>


