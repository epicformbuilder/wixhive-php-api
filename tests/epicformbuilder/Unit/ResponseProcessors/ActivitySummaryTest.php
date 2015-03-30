<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 3:46 PM
 */

use epicformbuilder\Wix\ActivityType;
use epicformbuilder\Wix\Models\ActivityTypeSummary;
use epicformbuilder\WixHiveApi\Response;
use epicformbuilder\WixHiveApi\ResponseProcessors\ActivitySummary;
use epicformbuilder\Wix\Models\ActivitySummary as ActivitySummaryModel;
use epicformbuilder\WixHiveApi\Signature;

class ActivitySummaryTest extends PHPUnit_Framework_TestCase
{

    public function testProcessShouldReturnExpectedActivitySummaryResult()
    {
        $total = 100;
        $from = new DateTime("2015-01-01 12:12:12", new DateTimeZone("UTC"));
        $until = new DateTime("2015-02-01 12:12:12", new DateTimeZone("UTC"));

        $activityTypes = [
            new ActivityTypeSummary(ActivityType::AUTH_LOGIN, $total, $from, $until),
            new ActivityTypeSummary(ActivityType::AUTH_REGISTER, $total, $from, $until),
        ];

        $expectedActivitySummaryModel = new ActivitySummaryModel($activityTypes, $total, $from, $until);

        $activityTypesObject1 = new stdClass();
        $activityTypesObject1->activityType = ActivityType::AUTH_LOGIN;
        $activityTypesObject1->total = $total;
        $activityTypesObject1->from = $from->format(Signature::TIME_FORMAT);
        $activityTypesObject1->until = $until->format(Signature::TIME_FORMAT);

        $activityTypesObject2 = new stdClass();
        $activityTypesObject2->activityType = ActivityType::AUTH_REGISTER;
        $activityTypesObject2->total = $total;
        $activityTypesObject2->from = $from->format(Signature::TIME_FORMAT);
        $activityTypesObject2->until = $until->format(Signature::TIME_FORMAT);

        $data = new stdClass();
        $data->activityTypes = [$activityTypesObject1, $activityTypesObject2];
        $data->total = $total;
        $data->from = $from->format(Signature::TIME_FORMAT);
        $data->until = $until->format(Signature::TIME_FORMAT);

        $activitySummaryModel = (new ActivitySummary())->process(new Response($data));

        $this->assertEquals($expectedActivitySummaryModel, $activitySummaryModel);
    }

}