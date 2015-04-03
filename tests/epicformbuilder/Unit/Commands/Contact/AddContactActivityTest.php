<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 11:28 AM
 */

use epicformbuilder\Wix\ActivityType;
use epicformbuilder\Wix\Models\Activity;
use epicformbuilder\Wix\Models\ActivityDetails;
use epicformbuilder\WixHiveApi\Commands\Contact\AddContactActivity;

class AddContactActivityTest extends \PHPUnit_Framework_TestCase
{

    public function testAddContactActivityCommandShouldReturnExpectedData()
    {
        $contactId = "12345";

        $date = new \DateTime("2015-01-01 12:12:12", new DateTimeZone("UTC"));

        $createActivityModel = new Activity("11111", $date, ActivityType::AUTH_STATUS_CHANGE, new stdClass(), "", new ActivityDetails("string1", "string2"));

        $command = new AddContactActivity($contactId, $createActivityModel);

        $this->assertEquals("https://openapi.wix.com/v1/contacts/$contactId/activities", $command->getEndpointUrl());
        $this->assertEquals("/contacts/$contactId/activities", $command->getCommand());
        $this->assertEquals("POST", $command->getHttpMethod());
        $this->assertEquals([], $command->getHttpHeaders());
        $this->assertEquals('{"id":"11111","createdAt":"2015-01-01T12:12:12.000Z","activityType":"auth/status-change","activityLocationUrl":"","activityDetails":{"additionalInfoUrl":"string1","summary":"string2"},"activityInfo":{}}', $command->getBody());
    }

}