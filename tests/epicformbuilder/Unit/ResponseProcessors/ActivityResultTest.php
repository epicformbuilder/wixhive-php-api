<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/27/15
 * Time: 10:21 PM
 */

use epicformbuilder\WixHiveApi\ResponseProcessors\ActivityResult;
use epicformbuilder\Wix\Models\ActivityResult as ActivityResultModel;

class ActivityResultTest extends PHPUnit_Framework_TestCase
{

    public function testProcessShouldReturnExpectedActivityResult()
    {
        $activityId = "activityId";
        $contactId = "contactId";

        $expectedActivityResultModel = new ActivityResultModel($activityId, $contactId);

        $data = new stdClass();
        $data->activityId = $activityId;
        $data->contactId = $contactId;

        $activityResultModel = (new ActivityResult())->process($data);

        $this->assertEquals($expectedActivityResultModel, $activityResultModel);
    }


}