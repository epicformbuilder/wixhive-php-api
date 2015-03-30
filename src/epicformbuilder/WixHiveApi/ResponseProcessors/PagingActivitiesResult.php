<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/27/15
 * Time: 1:32 PM
 */
namespace epicformbuilder\WixHiveApi\ResponseProcessors;

use epicformbuilder\Wix\Models\Activity as ActivityModel;
use epicformbuilder\Wix\Models\ActivityDetails;
use epicformbuilder\WixHiveApi\Response;
use epicformbuilder\Wix\Models\PagingActivitiesResult as PagingActivitiesResultModel;

class PagingActivitiesResult implements Processor
{
    /**
     * @param Response $response
     *
     * @return PagingActivitiesResultModel
     */
    public function process(Response $response)
    {
        $results = [];
        foreach($response->getResponseData()->results as $result){

            $activity = new ActivityModel(
                $result->id,
                new \DateTime($result->createdAt),
                $result->activityType,
                $result->activityInfo ,
                $result->activityLocationUrl,
                new ActivityDetails($result->activityDetails->additionalInfoUrl, $result->activityDetails->summary)
            );

            $results[] = $activity;
        }

        return new PagingActivitiesResultModel($response->getResponseData()->pageSize, $response->getResponseData()->previousCursor, $response->getResponseData()->nextCursor, $results);
    }
}