[Guzzle](http://guzzlephp.org) plugin for Runscope

- Requires a free Runscope account, [sign up here](https://www.runscope.com/signup)
- Automatically create Runscope URLs for your requests
- Automatically create proper `Runscope-Request-Port` header when using ports
- Support for authenticated buckets and service regions (see example below)

Install by issuing:

```cli
    ~ composer require mike27cubes/runscope-guzzle-plugin
```

Usage is as follows:

```php
<?php
require __DIR__ . '/../vendor/autoload.php';

use GuzzleHttp\Client;
use Runscope\Plugin\RunscopePlugin;

$client = new Client();

$runscopePlugin = new RunscopePlugin('bucket_key');

// authenticated bucket
// $runscopePlugin = new RunscopePlugin('bucket_key', 'authTokenHere');

// service region
// $runscopePlugin = new RunscopePlugin('bucket_key', null, 'eu1.runscope.net');

$client->getEmitter()->attach($runscopePlugin);

// Send the request and get the response
$response = $client->get('https://api.github.com/');
```

Enjoy!
