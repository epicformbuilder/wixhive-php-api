<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/27/15
 * Time: 6:48 PM
 */

use epicformbuilder\Wix\ActivityType;
use epicformbuilder\Wix\Models\ActivityDetails;
use epicformbuilder\WixHiveApi\Response;
use epicformbuilder\WixHiveApi\ResponseProcessors\Activity;
use epicformbuilder\Wix\Models\Activity as ActivityModel;
use epicformbuilder\WixHiveApi\Signature;

class ActivityTest extends PHPUnit_Framework_TestCase
{


    public function testProcessShouldReturnExpectedActivityModel()
    {
        $id = 1;
        $createdAt = new DateTime('now', new DateTimeZone("UTC"));
        $activityType = ActivityType::CONTACT_CONTACT_FORM;
        $activityInfo = new stdClass();
        $activityLocationUrl = "url";
        $additionalInfoUrl = "additionalInfoUrl";
        $summary = "summary";

        $expectedActivityModel = new ActivityModel($id, $createdAt, $activityType, $activityInfo, $activityLocationUrl, new ActivityDetails($additionalInfoUrl, $summary));

        $activityDetails = new stdClass();
        $activityDetails->additionalInfoUrl = $additionalInfoUrl;
        $activityDetails->summary = $summary;

        $data = new stdClass();
        $data->id = $id;
        $data->createdAt = $createdAt->format(Signature::TIME_FORMAT);
        $data->activityType = $activityType;
        $data->activityInfo = $activityInfo;
        $data->activityLocationUrl = $activityLocationUrl;
        $data->activityDetails = $activityDetails;

        $activityModel = (new Activity())->process(new Response($data));

        $this->assertEquals($expectedActivityModel, $activityModel);

    }

}