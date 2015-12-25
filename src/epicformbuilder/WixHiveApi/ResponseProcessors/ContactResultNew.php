<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 11/18/15
 * Time: 10:06 PM
 */
namespace epicformbuilder\WixHiveApi\ResponseProcessors;

use epicformbuilder\Wix\Models\Address;
use epicformbuilder\Wix\Models\Company;
use epicformbuilder\Wix\Models\Contact;
use epicformbuilder\Wix\Models\ContactEmail;
use epicformbuilder\Wix\Models\ContactName;
use epicformbuilder\Wix\Models\ContactPhone;
use epicformbuilder\Wix\Models\ContactUrl;
use epicformbuilder\Wix\Models\ImportantDate;
use epicformbuilder\Wix\Models\ReconcileContactDetails;
use epicformbuilder\Wix\Models\ReconcileContactDetailsNote;
use epicformbuilder\Wix\Models\ReconcileContactResult;
use epicformbuilder\Wix\Models\StateLink;

/**
 * Class ContactResultNew
 * @package epicformbuilder\WixHiveApi\Commands\Contact
 */
class ContactResultNew implements Processor
{
    /**
     * @param \stdClass $responseData
     *
     * @return ReconcileContactResult
     */
    public function process(\stdClass $responseData)
    {
        $emails=[];
        foreach($responseData->contact->emails as $email){
            $emails[] = new ContactEmail($email->id, $email->tag, $email->email, $email->emailStatus);
        }

        $phones = [];
        foreach($responseData->contact->phones as $phone){
            $phones[] = new ContactPhone($phone->id, $phone->tag, $phone->phone, $phone->normalizedPhone);
        }

        $addresses= [];
        foreach($responseData->contact->addresses as $address){
            $addresses[] = new Address($address->id, $address->tag, $address->address, $address->neighborhood, $address->city, $address->region, $address->country, $address->postalCode);
        }

        $urls = [];
        foreach($responseData->contact->urls as $url){
            $urls[] = new ContactUrl($url->id, $url->tag, $url->url);
        }

        $dates = [];
        foreach($responseData->contact->dates as $date){
            $dates[] = new ImportantDate($date->id, $date->tag, new \DateTime($date->date));
        }

        $links = [];
        foreach($responseData->contact->links as $link){
            $links[] = new StateLink($link->href, $link->rel);
        }

        $contactName = isset($responseData->contact->name) ? new ContactName($responseData->contact->name->prefix, $responseData->contact->name->first, $responseData->name->middle, $responseData->contact->name->last, $responseData->contact->name->suffix) : null;
        $company = isset($responseData->contact->company) ? new Company($responseData->contact->company->role, $responseData->contact->company->name) : null;

        $contact = new Contact(
            $responseData->contact->id,
            $contactName,
            isset($responseData->contact->picture) ? $responseData->contact->picture : null,
            $company,
            $emails,
            $phones,
            $addresses,
            $urls,
            $dates,
            $links,
            isset($responseData->contact->createdAt) ? new \DateTime($responseData->contact->createdAt) : null,
            isset($responseData->contact->modifiedAt) ? new \DateTime($responseData->contact->modifiedAt) : null
        );

        $rejectedData = [];
        if (isset($responseData->details->rejectedData))
        {
            foreach($responseData->details->rejectedData as $contactInfo)
            {
                $rejectedData[] =  $contactInfo;
            }
        }

        $existingData = [];
        if (isset($responseData->details->existingData))
        {
            foreach($responseData->details->existingData as $contactInfo)
            {
                $existingData[] =  $contactInfo;
            }
        }

        $details = new ReconcileContactDetails(
            $rejectedData,
            $existingData,
            new ReconcileContactDetailsNote(
                $responseData->details->note->returnedData,
                $responseData->details->note->requiredPermissionsForAllData
            ),
            $responseData->details->isNew
        );

        return new ReconcileContactResult($contact, $details);
    }
}