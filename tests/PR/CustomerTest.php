<?php

use PR\Customer;
use PR\Movie;
use PR\Rental;

class CustomerTest extends PHPUnit_Framework_TestCase
{
	public function testConstruct()
	{
		$name = 'Jim Bob';

		$customer = new Customer($name);

		$this->assertEquals($name, $customer->getName());
	}

	public function testStatement()
	{
		$name = 'Jim Bob';

		$movieSpeed  = new Movie('Speed', Movie::REGULAR);
		$movieSpeed2 = new Movie('Speed 2', Movie::REGULAR);
		$movieGravity  = new Movie('Gravity', Movie::NEW_RELEASE);
		$movieRonin    = new Movie('Ronin', Movie::NEW_RELEASE);
		$movieDumbo    = new Movie('Dumbo', Movie::CHILDRENS);
		$movieMulan    = new Movie('Mulan', Movie::CHILDRENS);

		$rentalSpeed  = new \PR\Rental($movieSpeed, 1);
		$rentalSpeed2 = new \PR\Rental($movieSpeed2, 5);
		$rentalGravity  = new \PR\Rental($movieGravity, 1);
		$rentalRonin    = new \PR\Rental($movieRonin, 3);
		$rentalDumbo    = new \PR\Rental($movieDumbo, 2);
		$rentalMulan    = new \PR\Rental($movieMulan, 4);

		$customer = new Customer($name);

		$customer->addRental($rentalSpeed);
		$customer->addRental($rentalSpeed2);
		$customer->addRental($rentalGravity);
		$customer->addRental($rentalRonin);
		$customer->addRental($rentalDumbo);
		$customer->addRental($rentalMulan);

		$statement = "Rental Record for Jim Bob\n" .
			"\tSpeed\t2\n" .
			"\tSpeed 2\t6.5\n" .
			"\tGravity\t3\n" .
			"\tRonin\t9\n" .
			"\tDumbo\t1.5\n" .
			"\tMulan\t3\n" .
			"Amount owed is 25\n" .
			"You earned 7 frequent renter points\n";

		$this->assertEquals($statement, $customer->statement());
	}
}