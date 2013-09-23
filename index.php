<?php 

require_once 'credentials.php';
require_once 'twitter/statuses.php';

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