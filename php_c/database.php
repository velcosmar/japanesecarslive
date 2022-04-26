<?php
error_reporting(0);
$servername = "sql305.epizy.com";
$dbUser = "epiz_30612511";
$dbPassword = "TUjJcTmatWaL0u";
$dbName = "epiz_30612511_DataBase";

$conn = mysqli_connect($servername,$dbUser,$dbPassword,$dbName);

if(!$conn) die("Connection failed: ".mysqli_connect_error());