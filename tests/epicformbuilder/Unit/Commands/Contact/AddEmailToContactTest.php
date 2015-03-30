<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 11:28 AM
 */

use epicformbuilder\Wix\Models\ContactEmail;
use epicformbuilder\WixHiveApi\Commands\Contact\AddEmailToContact as AddEmailToContactCommand;
use epicformbuilder\WixHiveApi\Signature;

class AddEmailToContactTest extends \PHPUnit_Framework_TestCase
{

    public function testAddEmailToContactCommandShouldReturnExpectedData()
    {
        $modifiedAt = new DateTime("now", new DateTimeZone("UTC"));
        $contactId = "12345";

        $emailModel = new ContactEmail("11111", "email-tag", "john@smith.com");
        $addEmailToContact = new AddEmailToContactCommand($contactId, $emailModel, $modifiedAt);

        $this->assertEquals("https://openapi.wix.com/v1/contacts/$contactId?modifiedAt=".urlencode($modifiedAt->format(Signature::TIME_FORMAT)), $addEmailToContact->getEndpointUrl());
        $this->assertEquals("/contacts/$contactId", $addEmailToContact->getCommand());
        $this->assertEquals("POST", $addEmailToContact->getHttpMethod());
        $this->assertEquals([], $addEmailToContact->getHttpHeaders());
        $this->assertEquals('{"id":"11111","tag":"email-tag","email":"john@smith.com","emailStatus":""}', $addEmailToContact->getBody());
    }

}