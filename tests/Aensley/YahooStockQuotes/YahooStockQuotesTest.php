<?php

use \Aensley\YahooStockQuotes\YahooStockQuotes;

class YahooStockQuotesTest extends \PHPUnit_Framework_TestCase {
	function testInstantiation() {
		$this->assertInstanceOf('YahooStockQuotes', new YahooStockQuotes);
	}
}
