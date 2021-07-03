<?php
// index.php: Just a bootstrap file
require_once "CarsByDate.php";

$carsByDate = new CarsByDate;
$carsByDate->run()->render();

