<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 11:28 AM
 */

use epicformbuilder\Wix\Models\ContactName;
use epicformbuilder\WixHiveApi\Commands\Contact\UpdateNameForContact as UpdateNameForContactCommand;
use epicformbuilder\WixHiveApi\Signature;

class UpdateNameForContactTest extends \PHPUnit_Framework_TestCase
{

    public function testUpdateNameForContactCommandShouldReturnExpectedData()
    {
        $modifiedAt = new DateTime("now", new DateTimeZone("UTC"));
        $contactId = "12345";

        $nameModel = new ContactName("Mr.", "Barack", "", "Obama", "");
        $updateNameForContact = new UpdateNameForContactCommand($contactId, $nameModel, $modifiedAt);

        $this->assertEquals("https://openapi.wix.com/v1/contacts/$contactId?modifiedAt=".urlencode($modifiedAt->format(Signature::TIME_FORMAT)), $updateNameForContact->getEndpointUrl());
        $this->assertEquals("/contacts/$contactId", $updateNameForContact->getCommand());
        $this->assertEquals("PUT", $updateNameForContact->getHttpMethod());
        $this->assertEquals([], $updateNameForContact->getHttpHeaders());
        $this->assertEquals('{"prefix":"Mr.","first":"Barack","middle":"","last":"Obama","suffix":""}', $updateNameForContact->getBody());
    }

}