<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 3:34 PM
 */
namespace epicformbuilder\WixHiveApi\ResponseProcessors;

use epicformbuilder\Wix\Models\ActivityTypeSummary;
use epicformbuilder\Wix\Models\ActivitySummary as ActivitySummaryModel;

class ActivitySummary implements Processor
{

    /**
     * @param \stdClass $responseData
     *
     * @return ActivitySummaryModel
     */
    public function process(\stdClass $responseData)
    {
        $activityTypes = [];
        foreach($responseData->activityTypes as $type){
            $from = new \DateTime($type->from, new \DateTimeZone("UTC"));
            $until = isset($type->until) ? new \DateTime($type->until, new \DateTimeZone("UTC")) : null;

            $activityTypes[] = new ActivityTypeSummary($type->activityType, $type->total, $from, $until);
        }

        $from = new \DateTime($responseData->from, new \DateTimeZone("UTC"));
        $until = isset($responseData->until) ? new \DateTime($responseData->until, new \DateTimeZone("UTC")) : null;

        return new ActivitySummaryModel($activityTypes, $responseData->total, $from, $until);
    }

}