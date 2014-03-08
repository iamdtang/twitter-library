<?php 

/**
 * GET search/tweets
 * https://dev.twitter.com/docs/api/1.1/get/search/tweets
 */

require_once __DIR__ . '/credentials.php';
require_once __DIR__ . '/../src/Tang/TwitterRestApi/TwitterApi.php';

$twitterSearch = new Tang\TwitterRestApi\TwitterApi([
	'api_key' => API_KEY,
	'api_secret' => API_SECRET
]);

$json = $twitterSearch->authenticate()->get('search/tweets', [
	'q' => 'laravel'
]);

echo $json;
// echo $twitterSearch>getLastUrl();
//echo $twitterSearch->getBearerToken();