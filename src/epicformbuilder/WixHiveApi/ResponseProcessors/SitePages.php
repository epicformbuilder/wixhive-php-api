<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 4:06 PM
 */
namespace epicformbuilder\WixHiveApi\ResponseProcessors;

use epicformbuilder\Wix\Models\Page;
use epicformbuilder\Wix\Models\SitePages as SitePagesModel;
use epicformbuilder\Wix\Models\Site as SiteModel;

/**
 * Class SitePages
 *
 * @package epicformbuilder\WixHiveApi\ResponseProcessors
 */
class SitePages implements Processor
{
    /**
     * @param \stdClass $responseData
     *
     * @return SitePagesModel
     */
    public function process(\stdClass $responseData)
    {
        $siteUrl = new SiteModel($responseData->siteUrl->url, $responseData->siteUrl->status);

        $pages = [];
        foreach($responseData->pages as $page){
            $pages[] = new Page($page->path, $page->wixPageId, $page->appPageId);
        }

        return  new SitePagesModel($siteUrl, $pages);
    }
}