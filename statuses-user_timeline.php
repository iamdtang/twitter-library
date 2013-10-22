<?php 

/**
 * GET statuses/user_timeline
 * https://dev.twitter.com/docs/api/1.1/get/statuses/user_timeline
 */

require_once 'credentials.php';
require_once 'Twitter/Base.php';
require_once 'Twitter/Statuses.php';

$twitter = new Twitter\Statuses(array(
	'consumer_key' => CONSUMER_KEY,
	'secret' => SECRET
));

$twitter->authenticate();

$json = $twitter->get('statuses/user_timeline', array(
	'screen_name' => 'uscitp',
	'count' => 10,
	'exclude_replies' => true
));

echo $json;