<?php

use PR\Movie;

class MovieTest extends PHPUnit_Framework_TestCase
{
	public function testConstruct()
	{
		$title = 'Gravity';
		$priceCode = Movie::NEW_RELEASE;

		$movie = new Movie($title, $priceCode);

		$this->assertEquals($title, $movie->getTitle());
		$this->assertEquals($priceCode, $movie->getPriceCode());

		$newPriceCode = Movie::CHILDRENS;
		$movie->setPriceCode($newPriceCode);
		$this->assertEquals($newPriceCode, $movie->getPriceCode());
	}
}