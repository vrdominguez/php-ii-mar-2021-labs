
# Lab: Namespace

## Have a look at the OrderApp in the course VM.

### Identify the namespaces used

- Inside **src** folder
  - OrderApp\Controller
  - OrderApp\Core\Controller
  - OrderApp\Core\Db
  - OrderApp\Core\Form
  - OrderApp\Core\Form\Inputs
  - OrderApp\Core\Html
  - OrderApp\Core\Messaging
  - OrderApp\Core\Service
  - OrderApp\Core\Traits
  - OrderApp\Core\Validator
  - OrderApp\Core\View
  - OrderApp\Domain
  - OrderApp\Form
  - OrderApp\Model
  - OrderApp\Service
- Inside **vendor** folder (installed with composer):
  - Composer
  - Composer\Autoload
  - GuzzleHttp
  - GuzzleHttp\Cookie
  - GuzzleHttp\Exception
  - GuzzleHttp\Handler
  - GuzzleHttp\Promise
  - GuzzleHttp\Psr7
  - Monolog
  - Monolog\Formatter
  - Monolog\Handler
  - Monolog\Handler\Curl
  - Monolog\Handler\FingersCrossed
  - Monolog\Handler\Slack
  - Monolog\Handler\SyslogUdp
  - Monolog\Processor
  - Monolog\Test
  - Psr\Http\Client
  - Psr\Http\Message
  - Psr\Log
  - Psr\Log\Test


### How is autoloading initiated?

Inside `public/index.php`, using `spl_autoload_register` with a function which caculates de path for the class and requires de correct file:

```php
define('BASE', realpath(__DIR__ . '/../'));

// ... 

spl_autoload_register(
    function ($class) {
        $file = str_replace('\\', '/', $class) . '.php';
        require BASE . '/src/' . $file;
    }
);
```

It seems that in _"other time"_ the composer autoloader was used but, at the moment of writing this file, it was into a comentary:

```php
//require '../vendor/autoload.php';
```
