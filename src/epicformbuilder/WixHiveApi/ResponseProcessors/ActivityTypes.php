<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/27/15
 * Time: 2:14 PM
 */
namespace epicformbuilder\WixHiveApi\ResponseProcessors;

use epicformbuilder\WixHiveApi\Response;
use epicformbuilder\Wix\Models\ActivityTypes as ActivityTypesModel;

class ActivityTypes implements Processor
{
    /**
     * @param Response $response
     *
     * @return ActivityTypesModel
     */
    public function process(Response $response)
    {
        $types = (array)$response->getResponseData()->types;
        return new ActivityTypesModel($types);
    }
}