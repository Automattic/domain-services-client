# Automattic Domain Services Client

Client code for Automattic's [Domain Services](https://github.com/Automattic/domain-services-api).

## Installation & Usage

### Requirements

- PHP 7.4 and later.
  (Should also work with PHP 8.0.)

- Also requires an Http client compatible with \Psr\Http\Client\ClientInterface.

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php

// Change the path as necessary
require_once 'vendor/autoload.php';

use Automattic\Domain_Services\{Api, Command, Configuration, Entity, Response};

// Set the domain to use
$domain_name = new Entity\Domain_Name( 'a8ctest.com' );

// Set up a new domain contact
$domain_contacts = new Entity\Domain_Contacts(
	new Entity\Domain_Contact(
		null,
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
		),
		new Entity\Contact_Disclosure( \Automattic\Domain_Services\Entity\Contact_Disclosure::NONE )
	)
);

// Set up the Contacts\Set command
$command = new Command\Domain\Contacts\Set( $domain_name, $domain_contacts );

// Create an optional client transaction ID (useful for finding related log entries)
$client_transaction_id = 'client_tx_id_example';

// Configure API key authorization: apiKey
$config = Configuration::get_default_configuration()
	->set_api_key( 'X-DSAPI-KEY', 'YOUR_API_KEY' )
	->set_api_key( 'X-DSAPI-USER', 'YOUR_API_USER' );

$api = new Api(
	$config,
	new Response\Factory(),
	// If you want use custom http client, pass your client which implements `\Psr\Http\Client\ClientInterface`.
	new GuzzleHttp\Client(),
);

try {
	// Make the call to the endpoint
	/** @var Response\Domain\Contacts\Set $response */
	$response = $api->post( $command, $client_transaction_id );

	// Extract some data from the resopnse
	echo "Status: " . $response->get_status() . "\n";
	echo "Status description: " . $response->get_status_description() . "\n";
	echo "New contact ID: " . $response->get_contacts()->get_owner()->get_contact_id()->get_provider_contact_id() . "\n";
} catch (Exception $e) {
	echo 'Exception when calling Domain_Contacts_Set: ', $e->getMessage(), PHP_EOL;
}
```

## Run the unit tests

Install the dependencies via `composer`

```shell
$ composer install
```

Then run the unit tests

```shell
$ ./vendor/bin/phpunit -c ./test/phpunit.xml
```

## License

The Automattic Domain Services Client is licensed under [GNU General Public License v2 (or later)](./LICENSE.md).
