<?php

namespace PR;

class Movie {
	const CHILDRENS   = 2;
	const REGULAR     = 0;
	const NEW_RELEASE = 1;

	/**
	 * @var string
	 */
	protected $title;

	/**
	 * @var int
	 */
	protected $priceCode;

	/**
	 * @param string $title
	 * @param int $priceCode
	 */
	public function __construct($title, $priceCode)
	{
		$this->title = $title;
		$this->priceCode = $priceCode;
	}

	/**
	 * @return int
	 */
	public function getPriceCode()
	{
		return $this->priceCode;
	}

	/**
	 * @param int $priceCode
	 */
	public function setPriceCode($priceCode)
	{
		$this->priceCode = $priceCode;
	}

	/**
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}
}