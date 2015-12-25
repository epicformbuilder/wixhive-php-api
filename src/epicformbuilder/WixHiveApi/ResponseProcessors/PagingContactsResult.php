<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/27/15
 * Time: 3:02 PM
 */
namespace epicformbuilder\WixHiveApi\ResponseProcessors;

use epicformbuilder\Wix\Models\Address;
use epicformbuilder\Wix\Models\Company;
use epicformbuilder\Wix\Models\Contact as ContactModel;
use epicformbuilder\Wix\Models\ContactEmail;
use epicformbuilder\Wix\Models\ContactName;
use epicformbuilder\Wix\Models\ContactPhone;
use epicformbuilder\Wix\Models\ContactUrl;
use epicformbuilder\Wix\Models\ImportantDate;
use epicformbuilder\Wix\Models\PagingContactsResult as PagingContactsResultModel;
use epicformbuilder\Wix\Models\StateLink;


class PagingContactsResult implements Processor
{
    /**
     * @param \stdClass $responseData
     *
     * @return PagingContactsResultModel
     */
    public function process(\stdClass $responseData)
    {
        $results = [];
        foreach($responseData->results as $result){

            $emails=[];
            foreach($result->emails as $email){
                $emails[] = new ContactEmail($email->id, $email->tag, $email->email, $email->emailStatus);
            }

            $phones = [];
            foreach($result->phones as $phone){
                $phones[] = new ContactPhone($phone->id, $phone->tag, $phone->phone, $phone->normalizedPhone);
            }

            $addresses= [];
            foreach($result->addresses as $address){
                $addresses[] = new Address($address->id, $address->tag, $address->address, $address->neighborhood, $address->city, $address->region, $address->country, $address->postalCode);
            }

            $urls = [];
            foreach($result->urls as $url){
                $urls[] = new ContactUrl($url->id, $url->tag, $url->url);
            }

            $dates = [];
            foreach($result->dates as $date){
                $dates[] = new ImportantDate($date->id, $date->tag, new \DateTime($date->date));
            }

            $links = [];
            foreach($result->links as $link){
                $links[] = new StateLink($link->href, $link->rel);
            }

            $results[] = new ContactModel(
                $result->id,
                new ContactName($result->name->prefix, $result->name->first, $result->name->middle, $result->name->last, $result->name->suffix),
                $result->picture,
                new Company($result->company->role, $result->company->name),
                $emails,
                $phones,
                $addresses,
                $urls,
                $dates,
                $links,
                new \DateTime($result->createdAt),
                new \DateTime($result->modifiedAt)
            );
        }

        return new PagingContactsResultModel(
            $responseData->total,
            $responseData->pageSize,
            $responseData->previousCursor,
            $responseData->nextCursor,
            $results
        );
    }
}