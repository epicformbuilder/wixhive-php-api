<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/24/15
 * Time: 4:22 PM
 */

use epicformbuilder\Wix\ActivityType;
use epicformbuilder\Wix\Models\CreateActivity;
use epicformbuilder\WixHiveApi\Commands\Activity\CreateActivity as CreateActivityCommand;
use epicformbuilder\WixHiveApi\Signature;


class CreateActivityTest extends \PHPUnit_Framework_TestCase
{


    public function testCreateActivityCommandShouldReturnExpectedData()
    {

        $date = new \DateTime();
        $item = new \stdClass();
        $item->name = "test name";
        $item->value = "test value";

        $activityInfo = new \stdClass();
        $activityInfo->fields = [$item];

        $createActivityModel = new CreateActivity($date, ActivityType::CONTACT_CONTACT_FORM, null, null, $activityInfo, null);
        $createActivity = new CreateActivityCommand($createActivityModel);

        $this->assertEquals("https://openapi.wix.com/v1/activities", $createActivity->getEndpointUrl());
        $this->assertEquals("/activities", $createActivity->getCommand());
        $this->assertEquals("POST", $createActivity->getHttpMethod());
        $this->assertEquals([], $createActivity->getHttpHeaders());
        $this->assertEquals('{"createdAt":"'.$date->format(Signature::TIME_FORMAT).'","activityType":"contact/contact-form","activityInfo":{"fields":[{"name":"test name","value":"test value"}]}}', $createActivity->getBody());
    }



}