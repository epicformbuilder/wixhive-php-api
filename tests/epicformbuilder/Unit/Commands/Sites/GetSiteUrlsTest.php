<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 4:11 PM
 */
use epicformbuilder\WixHiveApi\Commands\Sites\GetSiteUrls;

class GetSiteUrlsTest extends \PHPUnit_Framework_TestCase
{
    public function testGetSiteUrlsCommandShouldReturnExpectedData()
    {

        $command = new GetSiteUrls();

        $this->assertEquals("https://openapi.wix.com/v1/sites/site", $command->getEndpointUrl());
        $this->assertEquals("/sites/site", $command->getCommand());
        $this->assertEquals("GET", $command->getHttpMethod());
        $this->assertEquals([], $command->getHttpHeaders());
        $this->assertEmpty($command->getBody());

    }


}