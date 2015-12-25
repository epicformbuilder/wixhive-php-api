<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/27/15
 * Time: 2:14 PM
 */
namespace epicformbuilder\WixHiveApi\ResponseProcessors;

use epicformbuilder\Wix\Models\ActivityTypes as ActivityTypesModel;

class ActivityTypes implements Processor
{
    /**
     * @param \stdClass $responseData
     *
     * @return ActivityTypesModel
     */
    public function process(\stdClass $responseData)
    {
        $types = (array)$responseData->types;
        return new ActivityTypesModel($types);
    }
}