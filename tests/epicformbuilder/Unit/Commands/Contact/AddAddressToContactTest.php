<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 11:28 AM
 */

use epicformbuilder\Wix\Models\Address;
use epicformbuilder\WixHiveApi\Commands\Contact\AddAddressToContact as AddAddressToContactCommand;
use epicformbuilder\WixHiveApi\Signature;

class AddAddressToContactTest extends \PHPUnit_Framework_TestCase
{

    public function testAddAddressToContactCommandShouldReturnExpectedData()
    {
        $modifiedAt = new DateTime("now", new DateTimeZone("UTC"));
        $contactId = "12345";

        $addressModel = new Address("11111", "address-tag", "", "NY", "NY area", "USA", "12345", "");
        $addAddressToContact = new AddAddressToContactCommand($contactId, $addressModel, $modifiedAt);

        $this->assertEquals("https://openapi.wix.com/v1/contacts/$contactId?modifiedAt=".urlencode($modifiedAt->format(Signature::TIME_FORMAT)), $addAddressToContact->getEndpointUrl());
        $this->assertEquals("/contacts/$contactId", $addAddressToContact->getCommand());
        $this->assertEquals("POST", $addAddressToContact->getHttpMethod());
        $this->assertEquals([], $addAddressToContact->getHttpHeaders());
        $this->assertEquals('{"id":"11111","tag":"address-tag","address":"","neighborhood":"NY","city":"NY area","region":"USA","country":"12345","postalCode":""}', $addAddressToContact->getBody());
    }

}