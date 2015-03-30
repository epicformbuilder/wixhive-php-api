<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/28/15
 * Time: 12:03 AM
 */

use epicformbuilder\Wix\Models\Activity as ActivityModel;
use epicformbuilder\Wix\ActivityType;
use epicformbuilder\Wix\Models\ActivityDetails;
use epicformbuilder\WixHiveApi\Commands\Activity\GetActivityById;
use epicformbuilder\WixHiveApi\Response;
use epicformbuilder\WixHiveApi\ResponseProcessor;
use epicformbuilder\WixHiveApi\Signature;

class ResponseProcessorTest extends \PHPUnit_Framework_TestCase
{


    public function testProcessShouldReturnModel()
    {

        $id = rand(1, 100);
        $createdAt = new DateTime('now', new DateTimeZone("UTC"));
        $activityType = ActivityType::CONTACT_CONTACT_FORM;
        $activityInfo = new stdClass();
        $activityLocationUrl = "url";
        $additionalInfoUrl = "additionalInfoUrl";
        $summary = "summary";

        $expectedModel = new ActivityModel($id, $createdAt, $activityType, $activityInfo, $activityLocationUrl, new ActivityDetails($additionalInfoUrl, $summary));

        $activityDetails = new stdClass();
        $activityDetails->additionalInfoUrl = $additionalInfoUrl;
        $activityDetails->summary = $summary;

        $responseData = new stdClass();
        $responseData->id = $id;
        $responseData->createdAt = $createdAt->format(Signature::TIME_FORMAT);
        $responseData->activityType = $activityType;
        $responseData->activityInfo = $activityInfo;
        $responseData->activityLocationUrl = $activityLocationUrl;
        $responseData->activityDetails = $activityDetails;

        $model = ResponseProcessor::process(new GetActivityById($id), new Response($responseData));

        $this->assertEquals($expectedModel, $model);
    }

    public function testProcessShouldThrowException()
    {
        $id = rand(1, 100);

        $responseData = new stdClass();
        $responseData->errorCode = 403;
        $responseData->message = "Permission denied";

        $this->setExpectedException('Exception', "Permission denied", 403);
        ResponseProcessor::process(new GetActivityById($id), new Response($responseData));
    }

}