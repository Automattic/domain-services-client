<?php declare( strict_types=1 );

namespace Automattic\Domain_Services\Test;

use Automattic\Domain_Services\{Api, Command, Configuration, Entity, Mock, Response};

class Domain_Services_Client_Test_Case extends \PHPUnit\Framework\TestCase {
    protected Response\Factory $response_factory;

    public function setUp(): void {
        parent::setUp();
        $this->response_factory = new Response\Factory();
    }
}
