<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/21/15
 * Time: 10:59 PM
 */

use epicformbuilder\WixHiveApi\Response;

class ResponseTest extends \PHPUnit_Framework_TestCase {

    public function testGetResponseDataShouldReturnResponse(){

        $anyStdClass = new \stdClass();
        $anyStdClass->string = "abc";
        $anyStdClass->int = 123;

        $response = new Response($anyStdClass);

        $this->assertEquals($anyStdClass, $response->getResponseData());

    }



}