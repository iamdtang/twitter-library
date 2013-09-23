<?php 

require_once 'credentials.php';
require_once 'twitter/status.php';

$twitter = new Twitter\Status(array(
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