<?php
// index.php: Just a bootstrap file
require_once "CarsByColor.php";

$carsByColor = new CarsByColor;
$carsByColor->run()->render();

