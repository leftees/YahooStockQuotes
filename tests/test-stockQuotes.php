<?php
class StockQuotesTest extends PHPUnit_Framework_TestCase {
	function testInstantiation() {
		$this->assertInstanceOf('StockQuotes', new StockQuotes);
	}
}
