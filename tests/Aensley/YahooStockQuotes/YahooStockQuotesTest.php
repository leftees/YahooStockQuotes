<?php

use \Aensley\YahooStockQuotes\YahooStockQuotes;

class YahooStockQuotesTest extends \PHPUnit_Framework_TestCase {

	public $symbol = 'YHOO';
	public $stockQuotes;

	protected function setUp() {
		$this->stockQuotes = new YahooStockQuotes(array($this->symbol));
	}

	public function testInstantiation() {
		$this->assertInstanceOf('\Aensley\YahooStockQuotes\YahooStockQuotes', $this->stockQuotes);
	}

	public function testGetPrice() {
		$price = $this->stockQuotes->getPrice($this->symbol);
		$this->assertInternalType('string', $price);
		$this->assertRegExp('/^\$\d+(?:,\d{3})?\.\d{2}$/', $price);
	}

	public function testGetChange() {
		$change = $this->stockQuotes->getChange($this->symbol);
		$this->assertInternalType('string', $change);
		$this->assertRegExp('/^[+-]\d+\.\d{2}%$/', $change);
	}

	public function testGetUpdatedDate() {
		$date = $this->stockQuotes->getUpdatedDate('Y-m-d H:i:s');
		$this->assertInternalType('string', $date);
		$this->assertRegExp('/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/', $date);
	}
}
