<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 4:11 PM
 */
use epicformbuilder\WixHiveApi\Commands\Sites\GetSitePages;

class GetSitePagesTest extends \PHPUnit_Framework_TestCase
{
    public function testGetSitePagesCommandShouldReturnExpectedData()
    {

        $command = new GetSitePages();

        $this->assertEquals("https://openapi.wix.com/v1/sites/site/pages", $command->getEndpointUrl());
        $this->assertEquals("/sites/site/pages", $command->getCommand());
        $this->assertEquals("GET", $command->getHttpMethod());
        $this->assertEquals([], $command->getHttpHeaders());
        $this->assertEmpty($command->getBody());

    }


}