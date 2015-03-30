<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 11:28 AM
 */

use epicformbuilder\Wix\Models\ImportantDate;
use epicformbuilder\WixHiveApi\Commands\Contact\UpdateDateForContact as UpdateDateForContactCommand;
use epicformbuilder\WixHiveApi\Signature;

class UpdateDateForContactTest extends \PHPUnit_Framework_TestCase
{

    public function testUpdateDateForContactCommandShouldReturnExpectedData()
    {
        $modifiedAt = new DateTime("now", new DateTimeZone("UTC"));
        $contactId = "12345";
        $dateId ="6789";

        $dateModel = new ImportantDate("1111", "date-tag", new DateTime("2015-01-01 12:12:12", new DateTimeZone("UTC")));
        $updateDateForContact = new UpdateDateForContactCommand($contactId, $dateId, $dateModel, $modifiedAt);

        $this->assertEquals("https://openapi.wix.com/v1/contacts/$contactId/date/$dateId?modifiedAt=".urlencode($modifiedAt->format(Signature::TIME_FORMAT)), $updateDateForContact->getEndpointUrl());
        $this->assertEquals("/contacts/$contactId/date/$dateId", $updateDateForContact->getCommand());
        $this->assertEquals("PUT", $updateDateForContact->getHttpMethod());
        $this->assertEquals([], $updateDateForContact->getHttpHeaders());
        $this->assertEquals('{"id":"1111","tag":"date-tag","date":"2015-01-01T12:12:12.000Z"}', $updateDateForContact->getBody());
    }

}