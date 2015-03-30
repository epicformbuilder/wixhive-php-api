<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 11:28 AM
 */

use epicformbuilder\Wix\Models\ContactUrl;
use epicformbuilder\WixHiveApi\Commands\Contact\AddUrlToContact as AddUrlToContactCommand;
use epicformbuilder\WixHiveApi\Signature;

class AddUrlToContactTest extends \PHPUnit_Framework_TestCase
{

    public function testAddUrlToContactCommandShouldReturnExpectedData()
    {
        $modifiedAt = new DateTime("now", new DateTimeZone("UTC"));
        $contactId = "12345";

        $urlModel = new ContactUrl("111", "url-tag", "http://wix.com");
        $addUrlToContact = new AddUrlToContactCommand($contactId, $urlModel, $modifiedAt);

        $this->assertEquals("https://openapi.wix.com/v1/contacts/$contactId?modifiedAt=".urlencode($modifiedAt->format(Signature::TIME_FORMAT)), $addUrlToContact->getEndpointUrl());
        $this->assertEquals("/contacts/$contactId", $addUrlToContact->getCommand());
        $this->assertEquals("POST", $addUrlToContact->getHttpMethod());
        $this->assertEquals([], $addUrlToContact->getHttpHeaders());
        $this->assertEquals('{"id":"111","tag":"url-tag","url":"http:\/\/wix.com"}', $addUrlToContact->getBody());
    }

}