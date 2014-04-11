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
			$thisAmount = $this->getCharge($each);

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

	public function getCharge(Rental $rental)
	{
		$result = 0;

		//determine amounts for each line
		switch ($rental->getMovie()->getPriceCode()) {
			case Movie::REGULAR:
				$result += 2;

				if ($rental->getDaysRented() > 2)
					$result += ($rental->getDaysRented() - 2) * 1.5;
				break;

			case Movie::NEW_RELEASE:
				$result += $rental->getDaysRented() * 3;
				break;
			case Movie::CHILDRENS:
				$result += 1.5;
				if ($rental->getDaysRented() > 3)
					$result += ($rental->getDaysRented() - 3) * 1.5;
				break;
		}

		return $result;
	}
}