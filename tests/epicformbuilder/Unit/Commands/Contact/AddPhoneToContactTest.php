<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 11:28 AM
 */

use epicformbuilder\Wix\Models\ContactPhone;
use epicformbuilder\WixHiveApi\Commands\Contact\AddPhoneToContact as AddPhoneToContactCommand;
use epicformbuilder\WixHiveApi\Signature;

class AddPhoneToContactTest extends \PHPUnit_Framework_TestCase
{

    public function testAddPhoneToContactCommandShouldReturnExpectedData()
    {
        $modifiedAt = new DateTime("now", new DateTimeZone("UTC"));
        $contactId = "12345";

        $phoneModel = new ContactPhone("11111", "phone-tag", "phone number", "normalized phone number");
        $addAddressToContact = new AddPhoneToContactCommand($contactId, $phoneModel, $modifiedAt);

        $this->assertEquals("https://openapi.wix.com/v1/contacts/$contactId?modifiedAt=".urlencode($modifiedAt->format(Signature::TIME_FORMAT)), $addAddressToContact->getEndpointUrl());
        $this->assertEquals("/contacts/$contactId", $addAddressToContact->getCommand());
        $this->assertEquals("POST", $addAddressToContact->getHttpMethod());
        $this->assertEquals([], $addAddressToContact->getHttpHeaders());
        $this->assertEquals('{"id":"11111","tag":"phone-tag","phone":"phone number","normalizedPhone":"normalized phone number"}', $addAddressToContact->getBody());
    }

}