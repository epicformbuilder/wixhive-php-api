<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 4:06 PM
 */
namespace epicformbuilder\WixHiveApi\ResponseProcessors;

use epicformbuilder\WixHiveApi\Response;
use epicformbuilder\Wix\Models\Site as SiteModel;

class Site implements Processor
{
    /**
     * @param Response $response
     *
     * @return SiteModel
     */
    public function process(Response $response)
    {
        return new SiteModel($response->getResponseData()->url, $response->getResponseData()->status);
    }
}