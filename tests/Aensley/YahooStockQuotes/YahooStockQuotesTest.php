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

	public function testEmptyInstantiation() {
		$this->assertInstanceOf('\Aensley\YahooStockQuotes\YahooStockQuotes', new YahooStockQuotes);
	}

	public function testUnknownPrice() {
		$this->assertEquals('Unknown', $this->stockQuotes->getPrice('invalid_symbol'));
	}

	public function testUnknownChange() {
		$this->assertEquals('Unknown', $this->stockQuotes->getChange('invalid_symbol'));
	}

	public function testGetPrice() {
		$price = $this->stockQuotes->getPrice($this->symbol);
		$this->assertInternalType('string', $price);
		// Example: $10.31 or $234,563.43
		$this->assertRegExp('/^\$\d+(?:,\d{3})?\.\d{2}$/', $price);
	}

	public function testGetChange() {
		$change = $this->stockQuotes->getChange($this->symbol);
		$this->assertInternalType('string', $change);
		// Example: +13.38% or -0.02%
		$this->assertRegExp('/^[+-]\d+\.\d{2}%$/', $change);
	}

	public function testGetUpdatedDate() {
		$date = $this->stockQuotes->getUpdatedDate('Y-m-d H:i:s');
		$this->assertInternalType('string', $date);
		// Example: 2016-04-12 07:22:14
		$this->assertRegExp('/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/', $date);
	}
}
