<?php 

/**
 * GET search/tweets
 * https://dev.twitter.com/docs/api/1.1/get/search/tweets
 */

require_once __DIR__ . '/credentials.php';
require_once __DIR__ . '/../src/Tang/TwitterApi/Base.php';
require_once __DIR__ . '/../src/Tang/TwitterApi/Search.php';

$twitterSearch = new Tang\TwitterApi\Search(array(
	'consumer_key' => CONSUMER_KEY,
	'secret' => SECRET
));

$json = $twitterSearch->authenticate()->get('search/tweets', array(
	'q' => 'laravel'
));

echo $json;
// echo $twitterSearch>getLastUrl();
//echo $twitterSearch->getBearerToken();