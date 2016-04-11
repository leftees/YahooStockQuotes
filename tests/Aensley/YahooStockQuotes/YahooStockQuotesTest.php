<?php

use \Aensley\YahooStockQuotes\YahooStockQuotes;

class YahooStockQuotesTest extends \PHPUnit_Framework_TestCase {
	function testInstantiation() {
		$this->assertInstanceOf('\Aensley\YahooStockQuotes\YahooStockQuotes', new YahooStockQuotes);
	}
}
