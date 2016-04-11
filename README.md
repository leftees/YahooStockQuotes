# YahooStockQuotes
Yahoo Stock Quotes in PHP

[![MIT License](https://img.shields.io/badge/license-MIT-blue.svg)](https://github.com/aensley/YahooStockQuotes/blob/master/LICENSE) [![Build Status](https://travis-ci.org/aensley/YahooStockQuotes.svg)](https://travis-ci.org/aensley/YahooStockQuotes) [![Code Climate](https://codeclimate.com/github/aensley/YahooStockQuotes/badges/gpa.svg)](https://codeclimate.com/github/aensley/YahooStockQuotes) [![Test Coverage](https://codeclimate.com/github/aensley/YahooStockQuotes/badges/coverage.svg)](https://codeclimate.com/github/aensley/YahooStockQuotes/coverage) [![Issue Count](https://codeclimate.com/github/aensley/YahooStockQuotes/badges/issue_count.svg)](https://codeclimate.com/github/aensley/YahooStockQuotes) [![Codacy Badge](https://api.codacy.com/project/badge/grade/753efb995ff64b9087cf2e4952e91038)](https://www.codacy.com/app/awensley/YahooStockQuotes) [![Codacy Badge](https://api.codacy.com/project/badge/coverage/753efb995ff64b9087cf2e4952e91038)](https://www.codacy.com/app/awensley/YahooStockQuotes) [![codecov.io](https://codecov.io/github/aensley/YahooStockQuotes/coverage.svg?branch=master)](https://codecov.io/github/aensley/YahooStockQuotes?branch=master)



## What it does

This library makes it simple to access any number of stock prices (and their changes) in your code. It limits itself to one update per day to save your server's (and Yahoo's) resources. It consists of [one code file](https://github.com/aensley/YahooStockQuotes/blob/master/stockQuotes.php) and [one cache file](https://github.com/aensley/YahooStockQuotes/blob/master/stockQuotes.json). No database necessary.

Merely set the [`$stockSymbols`](https://github.com/aensley/YahooStockQuotes/blob/master/stockQuotes.php#L17) array to your list of desired stocks' symbols, include the file, and use the [three public functions](#example-usage) where you need them.

Simple.


## Requirements

There must be a `stockQuotes.json` file in the same directory as the `stockQuotes.php` file. 

`stockQuotes.json` must be **WRITABLE** by the user who owns the PHP process (apache, www-data, nginx, hhvm, etc.).

If the file does not exist or is not writable, every page view will require a new request to Yahoo's servers, which will slow down all page views drastically and get your server blocked by Yahoo.


## Example usage

```php
<?php

include 'stockQuotes.php';

?><html>
	<head>
		<title>Stock Test</title>
	</head>
	<body>
		Price: <?php echo $stockQuotes->getPrice('YHOO'); ?>
		<br/>
		Change: <?php echo $stockQuotes->getChange('YHOO'); ?>
		<br/>
		Last updated: <?php echo $stockQuotes->getUpdatedDate(); ?>
	</body>
</html>
```

----

[![Supercharged by ZenHub.io](https://raw.githubusercontent.com/ZenHubIO/support/master/zenhub-badge.png)](https://zenhub.io)
