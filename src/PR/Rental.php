<?php

namespace PR;

class Rental {
	/**
	 * @var Movie
	 */
	protected $movie;

	/**
	 * @var int
	 */
	protected $daysRented;

	/**
	 * @param Movie $movie
	 * @param int   $daysRented
	 */
	public function __construct(Movie $movie, $daysRented)
	{
		$this->movie = $movie;
		$this->daysRented = $daysRented;
	}

	/**
	 * @return int
	 */
	public function getDaysRented()
	{
		return $this->daysRented;
	}

	/**
	 * @return Movie
	 */
	public function getMovie()
	{
		return $this->movie;
	}
}