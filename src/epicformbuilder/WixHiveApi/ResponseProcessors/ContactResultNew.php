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
use epicformbuilder\WixHiveApi\Response;

/**
 * Class ContactResultNew
 * @package epicformbuilder\WixHiveApi\Commands\Contact
 */
class ContactResultNew implements Processor
{
    /**
     * @param Response $response
     *
     * @return ReconcileContactResult
     */
    public function process(Response $response)
    {
        $emails=[];
        foreach($response->getResponseData()->contact->emails as $email){
            $emails[] = new ContactEmail($email->id, $email->tag, $email->email, $email->emailStatus);
        }

        $phones = [];
        foreach($response->getResponseData()->contact->phones as $phone){
            $phones[] = new ContactPhone($phone->id, $phone->tag, $phone->phone, $phone->normalizedPhone);
        }

        $addresses= [];
        foreach($response->getResponseData()->contact->addresses as $address){
            $addresses[] = new Address($address->id, $address->tag, $address->address, $address->neighborhood, $address->city, $address->region, $address->country, $address->postalCode);
        }

        $urls = [];
        foreach($response->getResponseData()->contact->urls as $url){
            $urls[] = new ContactUrl($url->id, $url->tag, $url->url);
        }

        $dates = [];
        foreach($response->getResponseData()->contact->dates as $date){
            $dates[] = new ImportantDate($date->id, $date->tag, new \DateTime($date->date));
        }

        $links = [];
        foreach($response->getResponseData()->contact->links as $link){
            $links[] = new StateLink($link->href, $link->rel);
        }

        $contactName = isset($response->getResponseData()->contact->name) ? new ContactName($response->getResponseData()->contact->name->prefix, $response->getResponseData()->contact->name->first, $response->getResponseData()->name->middle, $response->getResponseData()->contact->name->last, $response->getResponseData()->contact->name->suffix) : null;
        $company = isset($response->getResponseData()->contact->company) ? new Company($response->getResponseData()->contact->company->role, $response->getResponseData()->contact->company->name) : null;

        $contact = new Contact(
            $response->getResponseData()->contact->id,
            $contactName,
            isset($response->getResponseData()->contact->picture) ? $response->getResponseData()->contact->picture : null,
            $company,
            $emails,
            $phones,
            $addresses,
            $urls,
            $dates,
            $links,
            isset($response->getResponseData()->contact->createdAt) ? new \DateTime($response->getResponseData()->contact->createdAt) : null,
            isset($response->getResponseData()->contact->modifiedAt) ? new \DateTime($response->getResponseData()->contact->modifiedAt) : null
        );

        $rejectedData = [];
        if (isset($response->getResponseData()->details->rejectedData))
        {
            foreach($response->getResponseData()->details->rejectedData as $contactInfo)
            {
                $rejectedData[] =  $contactInfo;
            }
        }

        $existingData = [];
        if (isset($response->getResponseData()->details->existingData))
        {
            foreach($response->getResponseData()->details->existingData as $contactInfo)
            {
                $existingData[] =  $contactInfo;
            }
        }

        $details = new ReconcileContactDetails(
            $rejectedData,
            $existingData,
            new ReconcileContactDetailsNote(
                $response->getResponseData()->details->note->returnedData,
                $response->getResponseData()->details->note->requiredPermissionsForAllData
            ),
            $response->getResponseData()->details->isNew
        );

        return new ReconcileContactResult($contact, $details);
    }
}