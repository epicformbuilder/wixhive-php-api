<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 11:22 AM
 */
namespace epicformbuilder\WixHiveApi\ResponseProcessors;

use epicformbuilder\Wix\Models\Address;
use epicformbuilder\Wix\Models\Company;
use epicformbuilder\Wix\Models\ContactEmail;
use epicformbuilder\Wix\Models\ContactName;
use epicformbuilder\Wix\Models\ContactPhone;
use epicformbuilder\Wix\Models\ContactUrl;
use epicformbuilder\Wix\Models\ImportantDate;
use epicformbuilder\Wix\Models\StateLink;
use epicformbuilder\Wix\Models\Contact as ContactModel;

class Contact implements Processor
{
    /**
     * @param \stdClass $responseData
     *
     * @return ContactModel
     */
    public function process(\stdClass $responseData)
    {
        $emails=[];
        foreach($responseData->emails as $email){
            $emails[] = new ContactEmail($email->id, $email->tag, $email->email, $email->emailStatus);
        }

        $phones = [];
        foreach($responseData->phones as $phone){
            $phones[] = new ContactPhone($phone->id, $phone->tag, $phone->phone, $phone->normalizedPhone);
        }

        $addresses= [];
        foreach($responseData->addresses as $address){
            $addresses[] = new Address($address->id, $address->tag, $address->address, $address->neighborhood, $address->city, $address->region, $address->country, $address->postalCode);
        }

        $urls = [];
        foreach($responseData->urls as $url){
            $urls[] = new ContactUrl($url->id, $url->tag, $url->url);
        }

        $dates = [];
        foreach($responseData->dates as $date){
            $dates[] = new ImportantDate($date->id, $date->tag, new \DateTime($date->date));
        }

        $links = [];
        foreach($responseData->links as $link){
            $links[] = new StateLink($link->href, $link->rel);
        }

        return new ContactModel(
            $responseData->id,
            new ContactName($responseData->name->prefix, $responseData->name->first, $responseData->name->middle, $responseData->name->last, $responseData->name->suffix),
            $responseData->picture,
            new Company($responseData->company->role, $responseData->company->name),
            $emails,
            $phones,
            $addresses,
            $urls,
            $dates,
            $links,
            new \DateTime($responseData->createdAt),
            new \DateTime($responseData->modifiedAt)
        );
    }
}