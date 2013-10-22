### The start of a Twitter API library in PHP

#### Setup

1. go to [https://dev.twitter.com/apps/](https://dev.twitter.com/apps/) to define an application on Twitter
2. create a file called credentials.php
3. define the 2 following constants in credentials.php

```php
define("CONSUMER_KEY", "ENTER YOUR VALUE HERE");
define("SECRET", "ENTER YOUR VALUE HERE");
```

Once you have completed the above, run any of the examples below which are using [application-only authentication](https://dev.twitter.com/docs/auth/application-only-auth).

* search-tweets.php
* statuses-user_timeline.php

[Twitter REST API 1.1 Docs](https://dev.twitter.com/docs/api/1.1)

### Extending the library

1. Create a class that extends from Twitter\Base (see Search and Statuses for example classes)
2. Create an object passing in your application information (see Search and Statuses demos)
3. Call the _authenticate_ method
4. Call the _get(string $endpoint, array $qs)_ method


