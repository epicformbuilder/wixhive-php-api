<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/25/15
 * Time: 9:34 PM
 */

use epicformbuilder\WixHiveApi\Commands\Activity\GetActivityById;

class GetActivityByIdTest extends \PHPUnit_Framework_TestCase
{

    public function testGetActivityByIdCommandShouldReturnExpectedData()
    {
        $id = '123';
        $getActivityById = new GetActivityById($id);

        $this->assertEquals("https://openapi.wix.com/v1/activities/$id", $getActivityById->getEndpointUrl());
        $this->assertEquals("/activities/$id", $getActivityById->getCommand());
        $this->assertEquals("GET", $getActivityById->getHttpMethod());
        $this->assertEquals([], $getActivityById->getHttpHeaders());
        $this->assertEmpty($getActivityById->getBody());
    }

}