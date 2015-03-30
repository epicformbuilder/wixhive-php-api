<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/26/15
 * Time: 3:34 PM
 */

use epicformbuilder\Wix\Models\UpsertContact;
use epicformbuilder\WixHiveApi\Commands\Contact\UpsertContact as UpsertContactCommand;

class UpsertContactTest extends \PHPUnit_Framework_TestCase
{

    public function testUpsertContactCommandShouldReturnExpectedData()
    {

        $phone = "phone";
        $email = "email";
        $userSessionToken = "token";

        $upsertContactDto = new UpsertContact($phone, $email, $userSessionToken);

        $upsertContact = new UpsertContactCommand($upsertContactDto);

        $this->assertEquals("https://openapi.wix.com/v1/contacts", $upsertContact->getEndpointUrl());
        $this->assertEquals("/contacts", $upsertContact->getCommand());
        $this->assertEquals("PUT", $upsertContact->getHttpMethod());
        $this->assertEquals([], $upsertContact->getHttpHeaders());
        $this->assertEquals('{"phone":"phone","email":"email","userSessionToken":"token"}', $upsertContact->getBody());
    }
}