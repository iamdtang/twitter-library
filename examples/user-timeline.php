<?php 

/**
 * GET statuses/user_timeline
 * https://dev.twitter.com/docs/api/1.1/get/statuses/user_timeline
 */

require_once __DIR__ . '/credentials.php';
require_once __DIR__ . '/../src/Tang/TwitterRestApi/TwitterApi.php';

$twitterApi = new Tang\TwitterRestApi\TwitterApi([
	'api_key' => API_KEY,
	'api_secret' => API_SECRET
]);

$json = $twitterApi->authenticate()->get('statuses/user_timeline', [
	'screen_name' => 'uscitp',
	'count' => 10,
	'exclude_replies' => true
]);

echo $json;