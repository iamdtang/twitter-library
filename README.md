Twitter API Library for Applications
====================================

Visit [https://dev.twitter.com/apps/](https://dev.twitter.com/apps/) to define an application on Twitter and save your API key information.

Currently this library only supports [application-only authentication](https://dev.twitter.com/docs/auth/application-only-auth). This means that any request to the API for endpoints that require user context, such as posting tweets, __will not work__.

#### Searching tweets

```php
$twitterSearch = new Tang\TwitterRestApi\TwitterApi([
	'api_key' => API_KEY,
	'api_secret' => API_SECRET
]);

$json = $twitterSearch->authenticate()->get('search/tweets', [
	'q' => 'laravel'
]);
```

#### Getting a user's timeline

```php
$twitterApi = new Tang\TwitterRestApi\TwitterApi([
	'api_key' => API_KEY,
	'api_secret' => API_SECRET
]);

$json = $twitterApi->authenticate()->get('statuses/user_timeline', [
	'screen_name' => 'uscitp',
	'count' => 10,
	'exclude_replies' => true
]);
```

You can pass in any application level base route to the get method along with query string params passed as an array.

### Working Examples

See the examples folder for working examples


