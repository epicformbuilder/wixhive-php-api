<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 4:06 PM
 */
namespace epicformbuilder\WixHiveApi\ResponseProcessors;

use epicformbuilder\Wix\Models\Site as SiteModel;

/**
 * Class Site
 *
 * @package epicformbuilder\WixHiveApi\ResponseProcessors
 */
class Site implements Processor
{
    /**
     * @param \stdClass $responseData
     *
     * @return SiteModel
     */
    public function process(\stdClass $responseData)
    {
        return new SiteModel($responseData->url, $responseData->status);
    }
}