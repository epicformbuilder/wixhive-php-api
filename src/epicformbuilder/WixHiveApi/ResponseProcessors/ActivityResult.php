<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/27/15
 * Time: 1:00 PM
 */
namespace epicformbuilder\WixHiveApi\ResponseProcessors;

use epicformbuilder\Wix\Models\ActivityResult as ActivityResultModel;

class ActivityResult implements Processor
{
    /**
     * @param \stdClass $responseDataData
     *
     * @return ActivityResultModel
     */
    public function process(\stdClass $responseDataData)
    {
        return new ActivityResultModel($responseDataData->activityId, $responseDataData->contactId);
    }
}