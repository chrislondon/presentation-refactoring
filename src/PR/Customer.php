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
		$result = "Rental Record for " . $this->getName() . "\n";

		foreach ($this->rentals as $each) {
			$result .= "\t" . $each->getMovie()->getTitle() . "\t" . $each->getCharge() . "\n";
		}

		$result .= 'Amount owed is ' . $this->getTotalCharge() . "\n";
		$result .= 'You earned ' . $this->getTotalFrequentRenterPoints() . " frequent renter points\n";

		return $result;
	}

	/**
	 * @return string
	 */
	public function htmlStatement()
	{
		$result = "<h1>Rental Record for <strong>" . $this->getName() . "</strong></h1>";

		$result .= "<table>";
		foreach ($this->rentals as $each) {
			$result .= "<tr><td>" . $each->getMovie()->getTitle() . "</td><td>" . $each->getCharge() . "</td></tr>";
		}
		$result .= "</table>";

		$result .= '<p>Amount owed is <strong>' . $this->getTotalCharge() . "</strong></p>";
		$result .= '<p>You earned <strong>' . $this->getTotalFrequentRenterPoints() . "</strong> frequent renter points</p>";

		return $result;
	}

	/**
	 * @return float|int
	 */
	public function getTotalCharge()
	{
		$result = 0;

		foreach ($this->rentals as $rental)
		{
			$result += $rental->getCharge();
		}

		return $result;
	}

	/**
	 * @return int
	 */
	public function getTotalFrequentRenterPoints()
	{
		$result = 0;

		foreach ($this->rentals as $rental)
		{
			$result += $rental->getFrequentRenterPoints();
		}

		return $result;
	}
}