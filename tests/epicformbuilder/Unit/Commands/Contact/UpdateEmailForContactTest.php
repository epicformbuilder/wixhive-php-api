<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 11:28 AM
 */

use epicformbuilder\Wix\Models\ContactEmail;
use epicformbuilder\WixHiveApi\Commands\Contact\UpdateEmailForContact as UpdateEmailForContactCommand;
use epicformbuilder\WixHiveApi\Signature;

class UpdateEmailForContactTest extends \PHPUnit_Framework_TestCase
{

    public function testUpdateEmailForContactCommandShouldReturnExpectedData()
    {
        $modifiedAt = new DateTime("now", new DateTimeZone("UTC"));
        $contactId = "12345";
        $emailId ="6789";

        $email = new ContactEmail("1111", "email-tag", "john@smith.com", "emailstatus");
        $updateAddressForContact = new UpdateEmailForContactCommand($contactId, $emailId, $email, $modifiedAt);

        $this->assertEquals("https://openapi.wix.com/v1/contacts/$contactId/email/$emailId?modifiedAt=".urlencode($modifiedAt->format(Signature::TIME_FORMAT)), $updateAddressForContact->getEndpointUrl());
        $this->assertEquals("/contacts/$contactId/email/$emailId", $updateAddressForContact->getCommand());
        $this->assertEquals("PUT", $updateAddressForContact->getHttpMethod());
        $this->assertEquals([], $updateAddressForContact->getHttpHeaders());
        $this->assertEquals('{"id":"1111","tag":"email-tag","email":"john@smith.com","emailStatus":"emailstatus"}', $updateAddressForContact->getBody());
    }

}