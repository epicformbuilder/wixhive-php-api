<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/27/15
 * Time: 1:50 PM
 */
namespace epicformbuilder\WixHiveApi\ResponseProcessors;

use epicformbuilder\Wix\Models\ActivityDetails;
use epicformbuilder\Wix\Models\Activity as ActivityModel;

class Activity implements Processor
{
    /**
     * @param \stdClass $responseDataData
     *
     * @return ActivityModel
     */
    public function process(\stdClass $responseDataData)
    {
        $activityModel = new ActivityModel(
            $responseDataData->id,
            new \DateTime($responseDataData->createdAt),
            $responseDataData->activityType,
            $responseDataData->activityInfo,
            $responseDataData->activityLocationUrl,
            new ActivityDetails($responseDataData->activityDetails->additionalInfoUrl, $responseDataData->activityDetails->summary)
        );

        return $activityModel;
    }
}