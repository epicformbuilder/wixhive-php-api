<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/27/15
 * Time: 10:21 PM
 */

use epicformbuilder\WixHiveApi\Response;
use epicformbuilder\Wix\Models\Site as SiteModel;
use epicformbuilder\WixHiveApi\ResponseProcessors\Site;

class SiteTest extends PHPUnit_Framework_TestCase
{

    public function testProcessShouldReturnExpectedSiteResult()
    {
        $url = "http://wix.com";
        $status = "published";

        $expectedSiteModel = new SiteModel($url, $status);

        $data = new stdClass();
        $data->url = $url;
        $data->status = $status;

        $siteModel = (new Site())->process(new Response($data));

        $this->assertEquals($expectedSiteModel, $siteModel );
    }


}