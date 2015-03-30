<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/25/15
 * Time: 9:20 PM
 */

use epicformbuilder\WixHiveApi\Commands\Contact\GetContacts as GetContactsCommand;

class GetContacts extends \PHPUnit_Framework_TestCase
{

    public function testGetContactsCommandShouldReturnExpectedData()
    {

        $tag = "tag";
        $cursor = "cursor";
        $pageSize = "25";

        $getContacts = new GetContactsCommand($tag, $cursor, $pageSize);

        $this->assertEquals("https://openapi.wix.com/v1/contacts?tag=tag&cursor=cursor&pageSize=25", $getContacts->getEndpointUrl());
        $this->assertEquals("/contacts", $getContacts->getCommand());
        $this->assertEquals("GET", $getContacts->getHttpMethod());
        $this->assertEquals([], $getContacts->getHttpHeaders());
        $this->assertEmpty($getContacts->getBody());

    }
}