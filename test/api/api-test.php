<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Test;

use Automattic\Domain_Services\{Api, Command, Configuration, Entity, Mock, Response};

class ApiTest extends \PHPUnit\Framework\TestCase {
	public function test_api_success(): void {
		$mock_response_array = get_mock_response( 'Domain_Contacts_Set' );

		$mock_response = new Mock\Http\Response();
		$mock_response->set_mock_body_from_array( $mock_response_array );

		$mock_http_client = new Mock\Http\Client();
		$mock_http_client->set_mock_response( $mock_response );

		$config = Configuration::get_default_configuration()
			->set_api_key( 'X-DSAPI-KEY', 'YOUR_API_KEY' )
			->set_api_key( 'X-DSAPI-USER', 'YOUR_API_USER' );

		$api = new Api(
			$config,
			new Response\Factory(),
			$mock_http_client,
		);

// Set the domain to use
		$domain_name = new Entity\Domain_Name( 'a8ctest.com' );

// Set up a new domain contact
		$domain_contacts = new Entity\Domain_Contacts(
			new Entity\Domain_Contact(
				null,
				new Entity\Contact_Information(
					'Del',
					'Putnam',
					'',
					'904 River Rd',
					'',
					'23601',
					'Newport News',
					'VA',
					'US',
					'del@putnams.net',
					'+1.7577468269',
					''
				),
				new Entity\Contact_Disclosure( \Automattic\Domain_Services\Entity\Contact_Disclosure::NONE )
			)
		);

// Set up the Contacts\Set command
		$command = new Command\Domain\Contacts\Set( $domain_name, $domain_contacts );

// Create an optional client transaction ID
		$client_transaction_id = 'client_tx_id_example';

		try {
			// Make the call to the endpoint
			/** @var Response\Domain\Contacts\Set $response */
			$response = $api->post( $command, $client_transaction_id );

			// Extract some data from the resopnse
			echo "Status: " . $response->get_status() . "\n";
			echo "Status description: " . $response->get_status_description() . "\n";
			echo "New contact ID: " . $response->get_contacts()->get_owner()->get_contact_id()->get_provider_contact_id() . "\n";
		} catch (\Automattic\Domain_Services\Exception\Domain_Services_Exception $e) {
			echo 'Exception when calling Domain_Contacts_Set: ', $e->getMessage(), PHP_EOL;
			var_dump( $e->getCode() );
			var_dump( $e->getMessage() );
		}
	}
}
