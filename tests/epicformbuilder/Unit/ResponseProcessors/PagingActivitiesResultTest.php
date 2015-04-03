<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/27/15
 * Time: 11:38 PM
 */

use epicformbuilder\WixHiveApi\Response;
use epicformbuilder\WixHiveApi\ResponseProcessors\PagingActivitiesResult;
use epicformbuilder\Wix\Models\PagingActivitiesResult as PagingActivitiesResultModel;
use epicformbuilder\WixHiveApi\Signature;


class PagingActivitiesResultTest extends PHPUnit_Framework_TestCase
{
    use Givens;

    public function testProcessShouldReturnExpectedPagingContactsResultModel()
    {
        $pageSize = "25";
        $previousCursor = "prevCursor";
        $nextCursor = "next cursor";
        $activity = $this->givenAnActivityModel();
        $expectedPagingActivitiesResultModel = new PagingActivitiesResultModel($pageSize, $previousCursor, $nextCursor, [$activity]);

        $activityObject = new stdClass();
        $activityObject->activityInfo = $activity->activityInfo;
        $activityObject->activityLocationUrl = $activity->activityLocationUrl;
        $activityObject->activityType = $activity->activityType;
        $activityObject->createdAt = $activity->createdAt;

        $activityObject->id = $activity->id;
        $activityObject->activityDetails = new stdClass();
        $activityObject->activityDetails->additionalInfoUrl = $activity->activityDetails->additionalInfoUrl;
        $activityObject->activityDetails->summary = $activity->activityDetails->summary;


        $data = new stdClass();
        $data->pageSize = $pageSize;
        $data->previousCursor = $previousCursor;
        $data->nextCursor = $nextCursor;
        $data->results = [$activityObject];


        $pagingActivitiesResultModel = (new PagingActivitiesResult())->process(new Response($data));

        $this->assertEquals($expectedPagingActivitiesResultModel, $pagingActivitiesResultModel);

    }


}