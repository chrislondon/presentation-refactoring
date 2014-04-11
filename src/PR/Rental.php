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

	/**
	 * @return float|int
	 */
	public function getCharge()
	{
		$result = 0;

		//determine amounts for each line
		switch ($this->getMovie()->getPriceCode()) {
			case Movie::REGULAR:
				$result += 2;

				if ($this->getDaysRented() > 2)
					$result += ($this->getDaysRented() - 2) * 1.5;
				break;

			case Movie::NEW_RELEASE:
				$result += $this->getDaysRented() * 3;
				break;
			case Movie::CHILDRENS:
				$result += 1.5;
				if ($this->getDaysRented() > 3)
					$result += ($this->getDaysRented() - 3) * 1.5;
				break;
		}

		return $result;
	}

	/**
	 * @return int
	 */
	public function getFrequentRenterPoints()
	{
		if ($this->getMovie()->getPriceCode() === Movie::NEW_RELEASE && $this->getDaysRented() > 1) {
			return 2;
		} else {
			return 1;
		}
	}
}