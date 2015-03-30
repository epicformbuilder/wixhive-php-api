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
use epicformbuilder\WixHiveApi\Response;
use epicformbuilder\Wix\Models\Contact as ContactModel;

class Contact implements Processor
{
    /**
     * @param Response $response
     *
     * @return ContactModel
     */
    public function process(Response $response)
    {
        $emails=[];
        foreach($response->getResponseData()->emails as $email){
            $emails[] = new ContactEmail($email->id, $email->tag, $email->email, $email->emailStatus);
        }

        $phones = [];
        foreach($response->getResponseData()->phones as $phone){
            $phones[] = new ContactPhone($phone->id, $phone->tag, $phone->phone, $phone->normalizedPhone);
        }

        $addresses= [];
        foreach($response->getResponseData()->addresses as $address){
            $addresses[] = new Address($address->id, $address->tag, $address->address, $address->neighborhood, $address->city, $address->region, $address->country, $address->postalCode);
        }

        $urls = [];
        foreach($response->getResponseData()->urls as $url){
            $urls[] = new ContactUrl($url->id, $url->tag, $url->url);
        }

        $dates = [];
        foreach($response->getResponseData()->dates as $date){
            $dates[] = new ImportantDate($date->id, $date->tag, new \DateTime($date->date));
        }

        $links = [];
        foreach($response->getResponseData()->links as $link){
            $links[] = new StateLink($link->href, $link->rel);
        }

        return new ContactModel(
            $response->getResponseData()->id,
            new ContactName($response->getResponseData()->name->prefix, $response->getResponseData()->name->first, $response->getResponseData()->name->middle, $response->getResponseData()->name->last, $response->getResponseData()->name->suffix),
            $response->getResponseData()->picture,
            new Company($response->getResponseData()->company->role, $response->getResponseData()->company->name),
            $emails,
            $phones,
            $addresses,
            $urls,
            $dates,
            $links,
            new \DateTime($response->getResponseData()->createdAt),
            new \DateTime($response->getResponseData()->modifiedAt)
        );
    }
}