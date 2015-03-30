<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/22/15
 * Time: 11:48 AM
 */

use epicformbuilder\WixHiveApi\Connector;
use epicformbuilder\WixHiveApi\Request;
use epicformbuilder\WixHiveApi\Response;

class ConnectorTest extends \PHPUnit_Framework_TestCase {

    public function testExecuteShouldReturnResponse(){

        $responseData = new \stdClass;
        $responseData->activityId = "8004389d-776c-453d-a4f5-da7eef97af4a";
        $responseData->contactId = "f092a0fe-8821-4131-ab27-42d17972feac";
        $expectedResponse = new Response($responseData);

        $filepath = dirname(__FILE__).'/../../connector_data.txt';

        // prepare the request based on the command
        $request = new Request("file://".$filepath, "GET", [], "");

        $response = (new Connector())->execute($request);

        $this->assertEquals($expectedResponse, $response);
    }
}