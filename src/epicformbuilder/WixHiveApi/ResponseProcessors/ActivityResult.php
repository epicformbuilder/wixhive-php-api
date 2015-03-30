<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/27/15
 * Time: 1:00 PM
 */
namespace epicformbuilder\WixHiveApi\ResponseProcessors;

use epicformbuilder\WixHiveApi\Response;
use epicformbuilder\Wix\Models\ActivityResult as ActivityResultModel;

class ActivityResult implements Processor
{
    /**
     * @param Response $response
     *
     * @return ActivityResultModel
     */
    public function process(Response $response)
    {
        return new ActivityResultModel($response->getResponseData()->activityId, $response->getResponseData()->contactId);
    }
}