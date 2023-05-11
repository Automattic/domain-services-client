Client

Client code for Automattic's Domain Services.

---

## Purpose

This library is used to connect a php client to Automattic's domain management service. It is currently only intended
for use by applications hosted by Automattic and will not work for other use cases.

## Installation & Usage

### Requirements

- PHP 7.4 and later. (Should also work with PHP 8.0.)
- Also requires an Http client compatible with [PSR-18's ClientInterface implementation](https://www.php-fig.org/psr/psr-18/#clientinterface).

### Adding the library to your code

As mentioned in the [requirements](#requirements) above, the package expects a PSR-18 compatible HTTP client. There is a
list of available HTTP clients with that implementation [available here](https://packagist.org/providers/psr/http-client-implementation).
Below are instructions for both [Guzzle 6](#guzzle-6) and [Guzzle 7](#guzzle-7) as an example.

#### Guzzle 7

- Guzzle 7 implements both `PSR-18` and `PSR-17` standards. This makes it ready to work with the client library directly.
- To require this library and Guzzle 7 (if it's not already), the full command should look something like that:
  ```
  composer require automattic/domain-services-client guzzlehttp/guzzle
  ```
- Once this is done, make sure to require the composer autoload file `vendor/autoload.php` in your code if it's not already.
- You can see an example of the code [here](./dev-tools/examples/guzzle-7.php)

#### Guzzle 6

- Guzzle 6 does not implement PSR-18 `ClientInterface`, therefore you will need to use an adapter for it. One of the most common
  adapters for that is [php-http/guzzle6-adapter](https://packagist.org/packages/php-http/guzzle6-adapter) package.
- Guzzle 6 also does implement [PSR-17](https://www.php-fig.org/psr/psr-17/) HTTP Factories. There are many packages to choose from, but
  for this example, we will be using [http-interop/http-factory-guzzle](https://packagist.org/packages/http-interop/http-factory-guzzle)
- The full command should look something like that:
  ```
  composer require automattic/domain-services-client php-http/guzzle6-adapter http-interop/http-factory-guzzle
  ```
- Once this is done, make sure to require the composer autoload file `vendor/autoload.php` in your code if it's not already.
- You can see an example of the code [here](./dev-tools/examples/guzzle-6.php)

---

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php

// Change the path as necessary
require_once 'vendor/autoload.php';

use Automattic\Domain_Services_Client\{Api, Command, Configuration, Entity, Response};

// Set the domain to use
$domain_name = new Entity\Domain_Name( 'a8ctest.com' );

// Set up a new domain contact
$domain_contacts = new Entity\Domain_Contacts(
	new Entity\Domain_Contact(
		new Entity\Contact_Information(
			'John',
			'Doe',
			'',
			'123 Main St',
			'',
			'23601',
			'Utopia',
			'ST',
			'CC',
			'john.doe@example.com',
			'+1.7575551234',
			''
		)
	)
);

// Set up the Contacts\Set command
$command = new Command\Domain\Set\Contacts( $domain_name, $domain_contacts );

// Create an optional client transaction ID (useful for finding related log entries)
$client_transaction_id = 'client_tx_id_example';

// Configure API key authorization: apiKey
$config = Configuration::get_default_configuration()
    ->set_api_key( 'X-DSAPI-KEY', 'your-key-here' )
    ->set_api_key( 'X-DSAPI-USER', 'your-user-here' );

// Using Guzzle 7
$http_client = new GuzzleHttp\Client();
$http_factory = new GuzzleHttp\Psr7\HttpFactory();

$request_factory = new Request\Factory( $http_factory, $http_factory );
$response_factory = new Response\Factory();

$api = new Api( $config, $request_factory, $response_factory, $http_client );

try {
	// Make the call to the endpoint
	/** @var Response\Domain\Set\Contacts $response */
	$response = $api->post( $command, $client_transaction_id );

	// Extract some data from the resopnse
	echo "Status: " . $response->get_status() . "\n";
	echo "Status description: " . $response->get_status_description() . "\n";
	echo "New contact ID: " . $response->get_contacts()->get_owner()->get_contact_id()->get_provider_contact_id() . "\n";
} catch (Exception $e) {
	echo 'Exception when calling Domain_Set_Contacts: ', $e->getMessage(), PHP_EOL;
}
```

## Run the unit tests

Install the dependencies via `composer` by following the [instructions above](#adding-the-library-to-your-code)

```shell
$ composer install
```

Then run the unit tests

```shell
$ ./vendor/bin/phpunit -c ./test/phpunit.xml
```

## License

The Automattic Domain Services Client is licensed under [GNU General Public License v2 (or later)](./LICENSE.md).
