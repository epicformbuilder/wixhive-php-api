<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/25/15
 * Time: 9:39 PM
 */

use epicformbuilder\Wix\ActivityType;
use epicformbuilder\Wix\Scope;
use epicformbuilder\WixHiveApi\Commands\Activity\GetActivities;

class GetActivitiesTest extends \PHPUnit_Framework_TestCase
{

    public function testGetActivityTypesCommandShouldReturnExpectedData()
    {
        $activityTypes = [ActivityType::AUTH_LOGIN, ActivityType::AUTH_STATUS_CHANGE];
        $until = new \DateTime();
        $from = new \DateTime();
        $scope = Scope::SITE;
        $cursor = "cursor";
        $pageSize = "50";

        $getActivityTypes = new GetActivities($activityTypes, $until, $from, $scope, $cursor, $pageSize);

        $this->assertEquals("https://openapi.wix.com/v1/activities?activityTypes=auth%2Flogin%2Cauth%2Fstatus-change&scope=site&cursor=cursor&pageSize=50", $getActivityTypes->getEndpointUrl());
        $this->assertEquals("/activities", $getActivityTypes->getCommand());
        $this->assertEquals("GET", $getActivityTypes->getHttpMethod());
        $this->assertEquals([], $getActivityTypes->getHttpHeaders());
        $this->assertEmpty($getActivityTypes->getBody());
    }

}