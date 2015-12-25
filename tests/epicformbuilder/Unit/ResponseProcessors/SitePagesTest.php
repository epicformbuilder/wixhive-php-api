<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/27/15
 * Time: 10:21 PM
 */

use epicformbuilder\Wix\Models\Page;
use epicformbuilder\Wix\Models\Site as SiteModel;
use epicformbuilder\Wix\Models\SitePages as SitePagesModel;
use epicformbuilder\WixHiveApi\ResponseProcessors\SitePages;

class SitePagesTest extends PHPUnit_Framework_TestCase
{

    public function testProcessShouldReturnExpectedSitePageResult()
    {
        $url = "http://wix.com";
        $status = "published";
        $wixPageId = "1111";
        $appPageId = "2222";
        $path = "path";

        $expectedSitePageModel = new SitePagesModel(new SiteModel($url, $status), [
            new Page($path, $wixPageId , $appPageId),
        ]);

        $siteUrl = new stdClass();
        $siteUrl->url = $url;
        $siteUrl->status = $status;

        $page = new stdClass();
        $page->path = $path;
        $page->wixPageId= $wixPageId;
        $page->appPageId= $appPageId;

        $data = new stdClass();
        $data->siteUrl = $siteUrl;
        $data->pages = [$page];

        $sitePageModel  = (new SitePages())->process($data);

        $this->assertEquals($expectedSitePageModel, $sitePageModel );
    }


}