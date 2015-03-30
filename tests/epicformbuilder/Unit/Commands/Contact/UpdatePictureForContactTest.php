<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 11:28 AM
 */

use epicformbuilder\Wix\Models\Picture;
use epicformbuilder\WixHiveApi\Commands\Contact\UpdatePictureForContact as UpdatePictureForContactCommand;
use epicformbuilder\WixHiveApi\Signature;

class UpdatePictureForContactTest extends \PHPUnit_Framework_TestCase
{

    public function testUpdatePictureForContactCommandShouldReturnExpectedData()
    {
        $modifiedAt = new DateTime("now", new DateTimeZone("UTC"));
        $contactId = "12345";

        $pictureModel = new Picture("picture");
        $updatePictureForContact = new UpdatePictureForContactCommand($contactId, $pictureModel, $modifiedAt);

        $this->assertEquals("https://openapi.wix.com/v1/contacts/$contactId?modifiedAt=".urlencode($modifiedAt->format(Signature::TIME_FORMAT)), $updatePictureForContact->getEndpointUrl());
        $this->assertEquals("/contacts/$contactId", $updatePictureForContact->getCommand());
        $this->assertEquals("PUT", $updatePictureForContact->getHttpMethod());
        $this->assertEquals([], $updatePictureForContact->getHttpHeaders());
        $this->assertEquals('{"picture":"picture"}', $updatePictureForContact->getBody());
    }

}