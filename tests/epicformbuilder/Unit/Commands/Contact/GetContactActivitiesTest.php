<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 1:40 PM
 */

use epicformbuilder\Wix\ActivityType;
use epicformbuilder\Wix\Scope;
use epicformbuilder\WixHiveApi\Commands\Contact\GetContactActivities;

class GetContactActivitiesTest extends \PHPUnit_Framework_TestCase
{

    public function testUpdateAddressForContactCommandShouldReturnExpectedData()
    {
        $contactId = "12345";
        $activityTypes = [ActivityType::AUTH_REGISTER, ActivityType::AUTH_STATUS_CHANGE];
        $cursor = null;
        $from = new DateTime("2015-01-01 12:12:12", new DateTimeZone("UTC"));
        $until = new DateTime("2015-02-01 12:12:12", new DateTimeZone("UTC"));
        $pageSize = "50";
        $scope = Scope::SITE;

        $command = new GetContactActivities($contactId, $activityTypes, $cursor, $from, $until, $pageSize, $scope);

        $this->assertEquals("https://openapi.wix.com/v1/contacts/$contactId/activities?activityTypes=%27auth%2Fregister%2Cauth%2Fstatus-change&scope=site&pageSize=50&until=2015-02-01T12%3A12%3A12.000Z&from=2015-01-01T12%3A12%3A12.000Z", $command->getEndpointUrl());
        $this->assertEquals("/contacts/$contactId/activities", $command->getCommand());
        $this->assertEquals("GET", $command->getHttpMethod());
        $this->assertEquals([], $command->getHttpHeaders());
        $this->assertEmpty($command->getBody());
    }

}