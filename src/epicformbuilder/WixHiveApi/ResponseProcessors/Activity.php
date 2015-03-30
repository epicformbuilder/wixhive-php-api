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
use epicformbuilder\WixHiveApi\Response;

class Activity implements Processor
{
    /**
     * @param Response $response
     *
     * @return ActivityModel
     */
    public function process(Response $response)
    {
        $activityModel = new ActivityModel(
            $response->getResponseData()->id,
            new \DateTime($response->getResponseData()->createdAt),
            $response->getResponseData()->activityType,
            $response->getResponseData()->activityInfo,
            $response->getResponseData()->activityLocationUrl,
            new ActivityDetails($response->getResponseData()->activityDetails->additionalInfoUrl, $response->getResponseData()->activityDetails->summary)
        );

        return $activityModel;
    }
}