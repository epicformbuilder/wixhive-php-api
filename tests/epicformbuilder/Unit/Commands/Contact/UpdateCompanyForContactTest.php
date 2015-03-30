<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 12:07 AM
 */

use epicformbuilder\Wix\Models\Company;
use epicformbuilder\WixHiveApi\Commands\Contact\UpdateCompanyForContact as UpdateCompanyForContactCommand;
use epicformbuilder\WixHiveApi\Signature;

class UpdateCompanyForContactTest extends \PHPUnit_Framework_TestCase
{

    public function testUpdateCompanyForContactCommandShouldReturnExpectedData()
    {
        $modifiedAt = new DateTime("now", new DateTimeZone("UTC"));
        $contactId = "12345";

        $nameModel = new Company("role", "Wix");
        $updateCompanyForContact = new UpdateCompanyForContactCommand($contactId, $nameModel, $modifiedAt);

        $this->assertEquals("https://openapi.wix.com/v1/contacts/$contactId?modifiedAt=".urlencode($modifiedAt->format(Signature::TIME_FORMAT)), $updateCompanyForContact->getEndpointUrl());
        $this->assertEquals("/contacts/$contactId", $updateCompanyForContact->getCommand());
        $this->assertEquals("PUT", $updateCompanyForContact->getHttpMethod());
        $this->assertEquals([], $updateCompanyForContact->getHttpHeaders());
        $this->assertEquals('{"role":"role","name":"Wix"}', $updateCompanyForContact->getBody());
    }

}