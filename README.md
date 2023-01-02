# Automattic Domain Services Client

Client code for Automattic's [Domain Services](https://github.com/Automattic/domain-services-api).

## Installation & Usage

### Requirements

- Use of this library requires a reseller relationship with Automattic.
- PHP 7.4 and later. (Should also work with PHP 8.0.)
- Also requires an Http client compatible with \Psr\Http\Client\ClientInterface.

### Install

The recommended way to install the Domain Services Client is with [Composer](https://getcomposer.org).

```shell
# Install Composer
curl -sS https://getcomposer.org/installer | php
```

Or [download composer.phar](https://getcomposer.org/composer.phar) into your project root.

See the Composer documentation for complete installation instructions on various platforms.

You can add the Domain Services Client as a dependency using Composer:

```shell
composer require automattic/domain-services:?^1.0
```

Alternatively, you can specify it as a dependency in your project's existing composer.json file:

```json
{
  "require": {
    "automattic/domain-services": "^1.0"
  }
}
```

Install the dependencies bvy executing this in your project root:

```shell
composer install
```

Autoload the client files in your project:

```php
require 'vendor/autoload.php';
```

## Getting Started

After following the [installation procedure](#installation--usage) you can use something like the following to make
calls to the server:

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
$command = new Command\Domain\Set\Contacts( $domain_name, $domain_contacts );

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
