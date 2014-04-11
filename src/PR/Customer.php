<?php

namespace PR;

class Customer {
	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @var Rental[]
	 */
	protected $rentals = array();

	/**
	 * @param string $name
	 */
	public function __construct($name)
	{
		$this->name = $name;
	}

	/**
	 * @param Rental $arg
	 */
	public function addRental(Rental $arg)
	{
		$this->rentals[] = $arg;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @return string
	 */
	public function statement()
	{
		$totalAmount = 0;
		$frequentRenterPoints = 0;

		$rentals = $this->rentals;

		$result = "Rental Record for " . $this->getName() . "\n";

		foreach ($rentals as $each) {
			$thisAmount = $each->getCharge();

			// add frequent renter points
			$frequentRenterPoints++;

			// add bonus for a two day new release rental
			if (($each->getMovie()->getPriceCode() == Movie::NEW_RELEASE) && $each->getDaysRented() > 1)
				$frequentRenterPoints++;

			//show figures for this rental

			$result .= "\t" . $each->getMovie()->getTitle() . "\t" . $thisAmount . "\n";

			$totalAmount += $thisAmount;
		}

		$result .= 'Amount owed is ' . $totalAmount . "\n";
		$result .= 'You earned ' . $frequentRenterPoints . " frequent renter points\n";

		return $result;
	}
}