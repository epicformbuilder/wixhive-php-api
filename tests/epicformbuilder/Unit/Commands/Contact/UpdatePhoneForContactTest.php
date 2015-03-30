<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 11:28 AM
 */

use epicformbuilder\Wix\Models\ContactPhone;
use epicformbuilder\WixHiveApi\Commands\Contact\UpdatePhoneForContact as UpdatePhoneForContactCommand;
use epicformbuilder\WixHiveApi\Signature;

class UpdatePhoneForContactTest extends \PHPUnit_Framework_TestCase
{

    public function testUpdatePhoneForContactCommandShouldReturnExpectedData()
    {
        $modifiedAt = new DateTime("now", new DateTimeZone("UTC"));
        $contactId = "12345";
        $phoneId ="6789";

        $phone = new ContactPhone("1111", "phone-tag", "Phone Number", "");
        $updateAddressForContact = new UpdatePhoneForContactCommand($contactId, $phoneId, $phone, $modifiedAt);

        $this->assertEquals("https://openapi.wix.com/v1/contacts/$contactId/phone/$phoneId?modifiedAt=".urlencode($modifiedAt->format(Signature::TIME_FORMAT)), $updateAddressForContact->getEndpointUrl());
        $this->assertEquals("/contacts/$contactId/phone/$phoneId", $updateAddressForContact->getCommand());
        $this->assertEquals("PUT", $updateAddressForContact->getHttpMethod());
        $this->assertEquals([], $updateAddressForContact->getHttpHeaders());
        $this->assertEquals('{"id":"1111","tag":"phone-tag","phone":"Phone Number","normalizedPhone":""}', $updateAddressForContact->getBody());
    }

}