<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/27/15
 * Time: 2:59 PM
 */
namespace epicformbuilder\WixHiveApi\ResponseProcessors;

use epicformbuilder\Wix\Models\ContactResult as ContactResultModel;

class ContactResult implements Processor
{
    /**
     * @param \stdClass $responseData
     *
     * @return ContactResultModel
     */
    public function process(\stdClass $responseData)
    {
        return new ContactResultModel($responseData->contactId);
    }
}