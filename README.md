[Guzzle 6.x](http://guzzlephp.org) middleware for Runscope

- Requires a free Runscope account, [sign up here](https://www.runscope.com/signup)
- Automatically create Runscope URLs for your requests
- Automatically create proper `Runscope-Request-Port` header when using ports
- Support for authenticated buckets and service regions (see example below)

Install by issuing:

```cli
    ~ composer require jakprints/runscope-guzzle-middleware
```

Usage is as follows:

```php
<?php
require __DIR__ . '/../vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use Runscope\Middleware\RunscopeMiddleware;

$runscopeMiddleware = new RunscopeMiddleware('bucket_key');

// authenticated bucket
// $runscopeMiddleware = new RunscopeMiddleware('bucket_key', 'authTokenHere');

// service region
// $runscopeMiddleware = new RunscopeMiddleware('bucket_key', null, 'eu1.runscope.net');

$stack = HandlerStack::create();
$stack->push(Middleware::mapRequest($runscopeMiddleware));

$client = new Client(['handler' => $stack]);

// Send the request and get the response
$response = $client->get('https://api.github.com/');
```

Enjoy!
