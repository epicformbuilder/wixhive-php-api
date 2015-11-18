<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 11/18/15
 * Time: 8:44 PM
 */

use epicformbuilder\Wix\ActivityType;
use epicformbuilder\Wix\Models\CreateActivity;
use epicformbuilder\WixHiveApi\Commands\Contact\CreateContactActivity;
use epicformbuilder\WixHiveApi\Signature;


class CreateContactActivityTest extends \PHPUnit_Framework_TestCase{

    public function testCreateActivityCommandShouldReturnExpectedData()
    {
        $contactId = "12345";

        $date = new \DateTime();
        $item = new \stdClass();
        $item->name = "test name";
        $item->value = "test value";

        $activityInfo = new \stdClass();
        $activityInfo->fields = [$item];

        $createActivityModel = new CreateActivity($date, ActivityType::CONTACT_CONTACT_FORM, null, null, $activityInfo, null);
        $createActivity = new CreateContactActivity($contactId, $createActivityModel);

        $this->assertEquals("https://openapi.wix.com/v1/contacts/$contactId/activities", $createActivity->getEndpointUrl());
        $this->assertEquals("/contacts/$contactId/activities", $createActivity->getCommand());
        $this->assertEquals("POST", $createActivity->getHttpMethod());
        $this->assertEquals([], $createActivity->getHttpHeaders());
        $this->assertEquals('{"createdAt":"'.$date->format(Signature::TIME_FORMAT).'","activityType":"contact/contact-form","activityInfo":{"fields":[{"name":"test name","value":"test value"}]}}', $createActivity->getBody());
    }

}
