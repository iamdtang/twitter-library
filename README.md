Twitter API Library for Applications
====================================

Visit [https://dev.twitter.com/apps/](https://dev.twitter.com/apps/) to define an application on Twitter and save your API key information.

Currently this library only supports [application-only authentication](https://dev.twitter.com/docs/auth/application-only-auth). This means that any request to the API for endpoints that require user context, such as posting tweets, __will not work__.

#### Searching tweets

```php
$twitterSearch = new Tang\TwitterApi\Search(array(
	'consumer_key' => CONSUMER_KEY,
	'secret' => SECRET
));

$json = $twitterSearch->authenticate()->get('search/tweets', array(
	'q' => 'laravel'
));
```

#### Getting a user's timeline

```php
$twitterApi = new Tang\TwitterApi\Statuses(array(
	'consumer_key' => CONSUMER_KEY,
	'secret' => SECRET
));

$json = $twitterApi->authenticate()->get('statuses/user_timeline', array(
	'screen_name' => 'uscitp',
	'count' => 10,
	'exclude_replies' => true
));
```

### Working Examples

See the examples folder for working examples

### Extending the library

1. Create a class that extends from Tang\TwitterApi\Base (see Search and Statuses for example classes)
2. Create an object passing in your application information (see Search and Statuses demos)
3. Call the _authenticate_ method
4. Call the _get(string $endpoint, array $qs)_ method


