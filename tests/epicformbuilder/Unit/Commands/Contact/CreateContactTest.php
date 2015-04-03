<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/24/15
 * Time: 5:28 PM
 */

use epicformbuilder\Wix\Models\Address;
use epicformbuilder\Wix\Models\Company;
use epicformbuilder\Wix\Models\ContactEmail;
use epicformbuilder\Wix\Models\ContactName;
use epicformbuilder\Wix\Models\ContactPhone;
use epicformbuilder\Wix\Models\ContactUrl;
use epicformbuilder\Wix\Models\CreateContact;
use epicformbuilder\Wix\Models\ImportantDate;
use epicformbuilder\WixHiveApi\Commands\Contact\CreateContact as CreateContactCommand;

class CreateContactTest extends \PHPUnit_Framework_TestCase
{

    public function testCreateContactCommandShouldReturnExpectedData()
    {
        $picture = "Picture";
        $name = new ContactName("prefix", "firstname", "middlename", "lastname", "suffix");
        $company = new Company("role", "Company Name");
        $email = new ContactEmail("1", "email-tag", "email@wix.com", "emailStatus");
        $phone = new ContactPhone("2", "phone-tag", "phone", "123456");
        $address = new Address("3", "address-tag", "", "NewYork", "NewYork","","","");
        $url = new ContactUrl("url_id", "url_tag", "http://wix.com");
        $date = new ImportantDate("date_id", "date_tag", new \DateTime("2015-01-01 12:12:12"));

        $createContactModel = new CreateContact($name, $picture, $company, [$email], [$phone], [$address], [$url], [$date]);
        $createContact = new CreateContactCommand($createContactModel);

        $this->assertEquals("https://openapi.wix.com/v1/contacts", $createContact->getEndpointUrl());
        $this->assertEquals("/contacts", $createContact->getCommand());
        $this->assertEquals("POST", $createContact->getHttpMethod());
        $this->assertEquals([], $createContact->getHttpHeaders());
        $this->assertEquals('{"name":{"prefix":"prefix","first":"firstname","middle":"middlename","last":"lastname","suffix":"suffix"},"picture":"Picture","company":{"role":"role","name":"Company Name"},"emails":[{"id":"1","tag":"email-tag","email":"email@wix.com","emailStatus":"emailStatus"}],"phones":[{"id":"2","tag":"phone-tag","phone":"phone","normalizedPhone":"123456"}],"addresses":[{"id":"3","tag":"address-tag","address":"","neighborhood":"NewYork","city":"NewYork","region":"","country":"","postalCode":""}],"urls":[{"id":"url_id","tag":"url_tag","url":"http://wix.com"}],"dates":[{"id":"date_id","tag":"date_tag","date":"2015-01-01T12:12:12.000Z"}]}', $createContact->getBody());
    }


}