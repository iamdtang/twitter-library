### The start of a Twitter API library in PHP

#### Setup

1. go to [https://dev.twitter.com/apps/](https://dev.twitter.com/apps/) to define an application on Twitter
2. create a file called credentials.php

3. define the 2 following constants

```php
define("CONSUMER_KEY", "ENTER YOUR VALUE HERE");
define("SECRET", "ENTER YOUR VALUE HERE");
```

Once you have completed the above, run index.php for a demo that pulls tweets for a particular username using [application-only authentication](https://dev.twitter.com/docs/auth/application-only-auth).

[Twitter REST API 1.1 Docs](https://dev.twitter.com/docs/api/1.1)

Please expand on this to handle more of the Twitter API!
