<?php

set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__ . '/../src');

require(__DIR__ . '/../vendor/autoload.php');

use PR\Movie;
use PR\Rental;
use PR\Customer;

$movieSpeed   = new Movie('Speed', Movie::REGULAR);
$movieSpeed2  = new Movie('Speed 2', Movie::REGULAR);
$movieGravity = new Movie('Gravity', Movie::NEW_RELEASE);
$movieRonin   = new Movie('Ronin', Movie::NEW_RELEASE);
$movieDumbo   = new Movie('Dumbo', Movie::CHILDRENS);
$movieMulan   = new Movie('Mulan', Movie::CHILDRENS);

$rentalSpeed   = new Rental($movieSpeed, 1);
$rentalSpeed2  = new Rental($movieSpeed2, 5);
$rentalGravity = new Rental($movieGravity, 1);
$rentalRonin   = new Rental($movieRonin, 3);
$rentalDumbo   = new Rental($movieDumbo, 2);
$rentalMulan   = new Rental($movieMulan, 4);

$customer = new Customer('Jim Bob');

$customer->addRental($rentalSpeed);
$customer->addRental($rentalSpeed2);
$customer->addRental($rentalGravity);
$customer->addRental($rentalRonin);
$customer->addRental($rentalDumbo);
$customer->addRental($rentalMulan);

echo $customer->statement();