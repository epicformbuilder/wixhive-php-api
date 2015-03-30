<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/27/15
 * Time: 2:59 PM
 */
namespace epicformbuilder\WixHiveApi\ResponseProcessors;

use epicformbuilder\WixHiveApi\Response;
use epicformbuilder\Wix\Models\ContactResult as ContactResultModel;

class ContactResult implements Processor
{
    /**
     * @param Response $response
     *
     * @return ContactResultModel
     */
    public function process(Response $response)
    {
        return new ContactResultModel($response->getResponseData()->contactId);
    }
}