<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/31/15
 * Time: 8:16 PM
 */

use epicformbuilder\WixHiveApi\Commands\Contact\GetContactById;

class GetContactByIdTest extends \PHPUnit_Framework_TestCase
{

    public function testUpdateAddressForContactCommandShouldReturnExpectedData()
    {
        $contactId = "12345";

        $command = new GetContactById($contactId);

        $this->assertEquals("https://openapi.wix.com/v1/contacts/$contactId", $command->getEndpointUrl());
        $this->assertEquals("/contacts/$contactId", $command->getCommand());
        $this->assertEquals("GET", $command->getHttpMethod());
        $this->assertEquals([], $command->getHttpHeaders());
        $this->assertEmpty($command->getBody());
    }

}