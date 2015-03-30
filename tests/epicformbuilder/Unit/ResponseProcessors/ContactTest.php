<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 11:38 AM
 */

use epicformbuilder\WixHiveApi\Response;
use epicformbuilder\WixHiveApi\ResponseProcessors\Contact;

class ContactTest extends PHPUnit_Framework_TestCase
{
    use Givens;

    public function testProcessShouldReturnExpectedContactModel()
    {
        $expectedContactModel = $this->givenAContactModel();
        $contactObject = $this->givenAContactModelAsObject($expectedContactModel);

        $contactModel = (new Contact())->process(new Response($contactObject));

        $this->assertEquals($expectedContactModel, $contactModel);

    }

}