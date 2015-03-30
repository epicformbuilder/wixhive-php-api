<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 3:34 PM
 */
namespace epicformbuilder\WixHiveApi\ResponseProcessors;

use epicformbuilder\Wix\Models\ActivityTypeSummary;
use epicformbuilder\WixHiveApi\Response;
use epicformbuilder\Wix\Models\ActivitySummary as ActivitySummaryModel;

class ActivitySummary implements Processor
{

    /**
     * @param Response $response
     *
     * @return ActivitySummaryModel
     */
    public function process(Response $response)
    {
        $activityTypes = [];
        foreach($response->getResponseData()->activityTypes as $type){
            $from = new \DateTime($type->from, new \DateTimeZone("UTC"));
            $until = isset($type->until) ? new \DateTime($type->until, new \DateTimeZone("UTC")) : null;

            $activityTypes[] = new ActivityTypeSummary($type->activityType, $type->total, $from, $until);
        }

        $from = new \DateTime($response->getResponseData()->from, new \DateTimeZone("UTC"));
        $until = isset($response->getResponseData()->until) ? new \DateTime($response->getResponseData()->until, new \DateTimeZone("UTC")) : null;

        return new ActivitySummaryModel($activityTypes, $response->getResponseData()->total, $from, $until);
    }

}