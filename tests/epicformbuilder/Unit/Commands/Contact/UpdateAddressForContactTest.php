<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 11:28 AM
 */

use epicformbuilder\Wix\Models\Address;
use epicformbuilder\WixHiveApi\Commands\Contact\UpdateAddressForContact as UpdateAddressForContactCommand;
use epicformbuilder\WixHiveApi\Signature;

class UpdateAddressForContactTest extends \PHPUnit_Framework_TestCase
{

    public function testUpdateAddressForContactCommandShouldReturnExpectedData()
    {
        $modifiedAt = new DateTime("now", new DateTimeZone("UTC"));
        $contactId = "12345";
        $addressId ="6789";

        $address = new Address("1111", "address-tag", "", "NY", "NY", "USA", "12345");
        $updateAddressForContact = new UpdateAddressForContactCommand($contactId, $addressId, $address, $modifiedAt);

        $this->assertEquals("https://openapi.wix.com/v1/contacts/$contactId/address/$addressId?modifiedAt=".urlencode($modifiedAt->format(Signature::TIME_FORMAT)), $updateAddressForContact->getEndpointUrl());
        $this->assertEquals("/contacts/$contactId/address/$addressId", $updateAddressForContact->getCommand());
        $this->assertEquals("PUT", $updateAddressForContact->getHttpMethod());
        $this->assertEquals([], $updateAddressForContact->getHttpHeaders());
        $this->assertEquals('{"id":"1111","tag":"address-tag","address":"","neighborhood":"NY","city":"NY","region":"USA","country":"12345","postalCode":""}', $updateAddressForContact->getBody());
    }

}