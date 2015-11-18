<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 11/18/15
 * Time: 11:52 PM
 */

use epicformbuilder\Wix\Models\Contact;
use epicformbuilder\Wix\Models\ReconcileContactDetails;
use epicformbuilder\Wix\Models\ReconcileContactDetailsNote;
use epicformbuilder\Wix\Models\ReconcileContactResult;
use epicformbuilder\WixHiveApi\Response;
use epicformbuilder\WixHiveApi\ResponseProcessors\ContactResultNew;

class ContactResultNewTest extends PHPUnit_Framework_TestCase
{
    public function testProcessShouldReturnExpectedReconcileContactResultModel()
    {
        $returnedData = "RESTRICTED";
        $requiredPermissionsForAllData = ["ContactsReadPersonal"];
        $isNew = false;
        $contactId = "1111-1111-1111-1111";
        $date = "2015-11-18T20:04:10.635Z";

        $contact = new Contact($contactId, null, null, null, [], [], [], [], [], [], new DateTime($date));

        $details = new ReconcileContactDetails(
            [],
            [],
            new ReconcileContactDetailsNote(
                $returnedData,
                $requiredPermissionsForAllData
            ),
            $isNew
        );
        $expectedContactResultModel = new ReconcileContactResult($contact, $details);

        $data = new \stdClass();

        $data->contact = new \stdClass();
        $data->contact->id = $contactId;
        $data->contact->tags = [];
        $data->contact->notes = [];
        $data->contact->emails = [];
        $data->contact->phones = [];
        $data->contact->addresses = [];
        $data->contact->dates = [];
        $data->contact->urls = [];
        $data->contact->custom = [];
        $data->contact->links = [];
        $data->contact->createdAt = $date;

        $data->details = new \stdClass();
        $data->details->isNew = false;
        $data->details->note = new \stdClass();
        $data->details->note->returnedData = $returnedData;
        $data->details->note->requiredPermissionsForAllData = ["ContactsReadPersonal"];


        $contactResult= (new ContactResultNew())->process(new Response($data));

        $this->assertEquals($expectedContactResultModel, $contactResult);

    }

}