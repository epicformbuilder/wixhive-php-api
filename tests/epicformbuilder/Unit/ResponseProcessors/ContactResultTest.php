<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/27/15
 * Time: 10:31 PM
 */

use epicformbuilder\WixHiveApi\ResponseProcessors\ContactResult;
use epicformbuilder\Wix\Models\ContactResult as ContactResultModel;

class ContactResultTest extends PHPUnit_Framework_TestCase
{
    public function testProcessShouldReturnExpectedContactResultModel()
    {
        $contactId = "contactId";

        $expectedContactResultModel = new ContactResultModel($contactId);

        $data = new stdClass();
        $data->contactId = $contactId;

        $contactResultModel = (new ContactResult())->process($data);

        $this->assertEquals($expectedContactResultModel, $contactResultModel);

    }

}