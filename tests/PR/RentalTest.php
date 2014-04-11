<?php

use PR\Movie;
use PR\Rental;

class RentalTest extends PHPUnit_Framework_TestCase
{
	public function testConstruct()
	{
		$movie = new Movie('Gravity', Movie::NEW_RELEASE);
		$daysRented = 5;

		$rental = new Rental($movie, $daysRented);

		$this->assertEquals($movie, $rental->getMovie());
		$this->assertEquals($daysRented, $rental->getDaysRented());
	}
}