<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 11:28 AM
 */

use epicformbuilder\Wix\EmailSubscriptionType;
use epicformbuilder\Wix\Models\ContactEmailStatus;
use epicformbuilder\WixHiveApi\Commands\Contact\UpdateEmailSubscriptionStatusForContact as UpdateEmailSubscriptionStatusForContactCommand;
use epicformbuilder\WixHiveApi\Signature;

class UpdateEmailSubscriptionStatusForContactTest extends \PHPUnit_Framework_TestCase
{

    public function testUpdateEmailSubscriptionStatusForContactCommandShouldReturnExpectedData()
    {
        $modifiedAt = new DateTime("now", new DateTimeZone("UTC"));
        $contactId = "12345";
        $emailId ="6789";

        $email = new ContactEmailStatus(EmailSubscriptionType::RECURRING);
        $command = new UpdateEmailSubscriptionStatusForContactCommand($contactId, $emailId, $email, $modifiedAt);

        $this->assertEquals("https://openapi.wix.com/v1/contacts/$contactId/email/$emailId/subscription?modifiedAt=".urlencode($modifiedAt->format(Signature::TIME_FORMAT)), $command->getEndpointUrl());
        $this->assertEquals("/contacts/$contactId/email/$emailId/subscription", $command->getCommand());
        $this->assertEquals("PUT", $command->getHttpMethod());
        $this->assertEquals([], $command->getHttpHeaders());
        $this->assertEquals('{"status":"Recurring"}', $command->getBody());
    }

}