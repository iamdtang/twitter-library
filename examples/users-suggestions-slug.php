<?php 

/**
 * GET users/suggestions/:slug
 * https://dev.twitter.com/docs/api/1.1/get/users/suggestions/%3Aslug
 */

require_once __DIR__ . '/credentials.php';
require_once __DIR__ . '/../src/Tang/TwitterRestApi/TwitterApi.php';

$twitterApi = new Tang\TwitterRestApi\TwitterApi([
	'api_key' => API_KEY,
	'api_secret' => API_SECRET
]);

$twitterApi->authenticate();
$json = $twitterApi->get('users/suggestions/music');
echo $json;