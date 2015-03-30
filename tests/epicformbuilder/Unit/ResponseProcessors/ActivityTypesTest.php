<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/27/15
 * Time: 10:25 PM
 */

use epicformbuilder\Wix\ActivityType;
use epicformbuilder\Wix\Models\ActivityTypes as ActivityTypesModel;
use epicformbuilder\WixHiveApi\Response;
use epicformbuilder\WixHiveApi\ResponseProcessors\ActivityTypes;

class ActivityTypesTest extends PHPUnit_Framework_TestCase
{

    public function testProcessShouldReturnExpectedActivityTypesModel()
    {
        $types = [ActivityType::AUTH_LOGIN, ActivityType::AUTH_REGISTER];
        $expectedActivityTypesModel = new ActivityTypesModel($types);

        $data = new stdClass();
        $data->types = $types;

        $activityTypesModel = (new ActivityTypes())->process(new Response($data));

        $this->assertEquals($expectedActivityTypesModel, $activityTypesModel);
    }

}