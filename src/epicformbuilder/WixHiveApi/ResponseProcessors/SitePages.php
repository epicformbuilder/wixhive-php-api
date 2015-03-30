<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 4:06 PM
 */
namespace epicformbuilder\WixHiveApi\ResponseProcessors;

use epicformbuilder\Wix\Models\Page;
use epicformbuilder\WixHiveApi\Response;
use epicformbuilder\Wix\Models\SitePages as SitePagesModel;
use epicformbuilder\Wix\Models\Site as SiteModel;

class SitePages implements Processor
{
    /**
     * @param Response $response
     *
     * @return SitePagesModel
     */
    public function process(Response $response)
    {
        $siteUrl = new SiteModel($response->getResponseData()->siteUrl->url, $response->getResponseData()->siteUrl->status);

        $pages = [];
        foreach($response->getResponseData()->pages as $page){
            $pages[] = new Page($page->path, $page->wixPageId, $page->appPageId);
        }

        return  new SitePagesModel($siteUrl, $pages);
    }
}