<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 11:28 AM
 */

use epicformbuilder\Wix\Models\ImportantDate;
use epicformbuilder\WixHiveApi\Commands\Contact\AddDateToContact as AddDateToContactCommand;
use epicformbuilder\WixHiveApi\Signature;

class AddDateToContactTest extends \PHPUnit_Framework_TestCase
{

    public function testAddDateToContactCommandShouldReturnExpectedData()
    {
        $modifiedAt = new DateTime("now", new DateTimeZone("UTC"));
        $contactId = "12345";

        $dateModel = new ImportantDate("1111", "date-tag", new DateTime("2015-01-01 12:12:12", new DateTimeZone("UTC")));
        $addDateToContact = new AddDateToContactCommand($contactId, $dateModel, $modifiedAt);

        $this->assertEquals("https://openapi.wix.com/v1/contacts/$contactId?modifiedAt=".urlencode($modifiedAt->format(Signature::TIME_FORMAT)), $addDateToContact->getEndpointUrl());
        $this->assertEquals("/contacts/$contactId", $addDateToContact->getCommand());
        $this->assertEquals("POST", $addDateToContact->getHttpMethod());
        $this->assertEquals([], $addDateToContact->getHttpHeaders());
        $this->assertEquals('{"id":"1111","tag":"date-tag","date":"2015-01-01T12:12:12.000Z"}', $addDateToContact->getBody());
    }

}