<?php 

/**
 * GET statuses/user_timeline
 * https://dev.twitter.com/docs/api/1.1/get/statuses/user_timeline
 */

require_once __DIR__ . '/credentials.php';
require_once __DIR__ . '/../src/Tang/TwitterApi/Base.php';
require_once __DIR__ . '/../src/Tang/TwitterApi/Statuses.php';

$twitterApi = new Tang\TwitterApi\Statuses(array(
	'consumer_key' => CONSUMER_KEY,
	'secret' => SECRET
));

$json = $twitterApi->authenticate()->get('statuses/user_timeline', array(
	'screen_name' => 'uscitp',
	'count' => 10,
	'exclude_replies' => true
));

echo $json;