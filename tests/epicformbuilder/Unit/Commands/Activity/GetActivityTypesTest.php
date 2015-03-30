<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/25/15
 * Time: 9:30 PM
 */

use epicformbuilder\WixHiveApi\Commands\Activity\GetActivityTypes;

class GetActivityTypesTest extends \PHPUnit_Framework_TestCase
{

    public function testGetActivityTypesCommandShouldReturnExpectedData()
    {
        $getActivityTypes = new GetActivityTypes();

        $this->assertEquals("https://openapi.wix.com/v1/activities/types", $getActivityTypes->getEndpointUrl());
        $this->assertEquals("/activities/types", $getActivityTypes->getCommand());
        $this->assertEquals("GET", $getActivityTypes->getHttpMethod());
        $this->assertEquals([], $getActivityTypes->getHttpHeaders());
        $this->assertEmpty($getActivityTypes->getBody());
    }

}