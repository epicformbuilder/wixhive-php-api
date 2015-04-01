<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 11:28 AM
 */

use epicformbuilder\Wix\Models\ContactUrl;
use epicformbuilder\WixHiveApi\Commands\Contact\UpdateUrlForContact as UpdateUrlForContactCommand;
use epicformbuilder\WixHiveApi\Signature;

class UpdateUrlForContactTest extends \PHPUnit_Framework_TestCase
{

    public function testUpdateUrlForContactCommandShouldReturnExpectedData()
    {
        $modifiedAt = new DateTime("now", new DateTimeZone("UTC"));
        $contactId = "12345";
        $urlId ="6789";

        $url = new ContactUrl("1111", "address-tag", "http://wix.com");
        $updateUrlForContact = new UpdateUrlForContactCommand($contactId, $urlId, $url, $modifiedAt);

        $this->assertEquals("https://openapi.wix.com/v1/contacts/$contactId/url/$urlId?modifiedAt=".urlencode($modifiedAt->format(Signature::TIME_FORMAT)), $updateUrlForContact->getEndpointUrl());
        $this->assertEquals("/contacts/$contactId/url/$urlId", $updateUrlForContact->getCommand());
        $this->assertEquals("PUT", $updateUrlForContact->getHttpMethod());
        $this->assertEquals([], $updateUrlForContact->getHttpHeaders());
        $this->assertEquals('{"id":"1111","tag":"address-tag","url":"http://wix.com"}', $updateUrlForContact->getBody());
    }

}