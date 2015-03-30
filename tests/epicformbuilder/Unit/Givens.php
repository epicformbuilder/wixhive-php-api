<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/27/15
 * Time: 10:39 PM
 */

use epicformbuilder\Wix\ActivityType;
use epicformbuilder\Wix\Models\Activity;
use epicformbuilder\Wix\Models\ActivityDetails;
use epicformbuilder\Wix\Models\Address;
use epicformbuilder\Wix\Models\Company;
use epicformbuilder\Wix\Models\Contact;
use epicformbuilder\Wix\Models\ContactEmail;
use epicformbuilder\Wix\Models\ContactName;
use epicformbuilder\Wix\Models\ContactPhone;
use epicformbuilder\Wix\Models\ContactUrl;
use epicformbuilder\Wix\Models\ImportantDate;
use epicformbuilder\Wix\Models\StateLink;

trait Givens
{

    /**
     * @return Contact
     */
    public function givenAContactModel()
    {
        $id = rand(1, 100);
        $name = new ContactName("Mr.", "John", "", "Smith", "");
        $picture = "picture".rand(1, 100);
        $company = new Company("role", "Wix");

        $emails = [
            new ContactEmail(rand(1,100), "contact1", "first@gmail.com", "optOut"),
            new ContactEmail(rand(1,100), "contact2", "second@gmail.com", "transactional"),
        ];

        $phones = [
            new ContactPhone(rand(1,100), "phone1", "phone_number", "normalized phone number"),
            new ContactPhone(rand(1,100), "phone2", "phone_number 2", "normalized phone number 2"),
        ];

        $addresses = [
            new Address(rand(1,100), "address1", "address", "neighborhood", "London", "London area", "UK", "12345"),
            new Address(rand(1,100), "address2", "address2", "neighborhood2", "Paris", "Paris area", "France", "54321"),
        ];

        $urls = [
            new ContactUrl(rand(1,100), "url_tag", "http://apple.com"),
            new ContactUrl(rand(1,100), "url_tag2", "http://wix.com"),
        ];

        $dates = [
            new ImportantDate(rand(1,100), "date_tag", new DateTime('now', new DateTimeZone("UTC"))),
            new ImportantDate(rand(1,100), "date_tag2", new DateTime('-1 hour', new DateTimeZone("UTC"))),
        ];

        $links = [
            new StateLink("http://apple.com/macbook", "rel"),
            new StateLink("http://apple.com/imac", "rel"),
        ];

        $createdAt = new DateTime("-1 hour", new DateTimeZone("UTC"));
        $modifiedAt = new DateTime("now", new DateTimeZone("UTC"));

        return new Contact($id, $name, $picture, $company, $emails, $phones, $addresses, $urls, $dates, $links, $createdAt, $modifiedAt);
    }

    /**
     * @return Activity
     */
    public function givenAnActivityModel(){

        $createdAt = new DateTime("now", new DateTimeZone("UTC"));
        $activityType = ActivityType::AUTH_STATUS_CHANGE;
        $activityInfo = new stdClass();
        $activityDetails = new ActivityDetails("additional info url", "summary");

        return new Activity(rand(1,100), $createdAt, $activityType, $activityInfo, "", $activityDetails);
    }

    /**
     * @param Contact $contact
     *
     * @return stdClass
     */
    public function givenAContactModelAsObject(Contact $contact)
    {
        $contactObject = new stdClass();
        $contactObject->id = $contact->id;

        $contactObject->name = new stdClass();
        $contactObject->name->prefix = $contact->name->prefix;
        $contactObject->name->first = $contact->name->first;
        $contactObject->name->middle = $contact->name->middle;
        $contactObject->name->last = $contact->name->last;
        $contactObject->name->suffix = $contact->name->suffix;

        $contactObject->picture = $contact->picture;

        $contactObject->company = new stdClass();
        $contactObject->company->role = $contact->company->role;
        $contactObject->company->name = $contact->company->name;

        $email1 = new stdClass();
        $email1->id = $contact->emails[0]->id;
        $email1->tag = $contact->emails[0]->tag;
        $email1->email = $contact->emails[0]->email;
        $email1->emailStatus = $contact->emails[0]->emailStatus;
        $email2 = new stdClass();
        $email2->id = $contact->emails[1]->id;
        $email2->tag = $contact->emails[1]->tag;
        $email2->email = $contact->emails[1]->email;
        $email2->emailStatus = $contact->emails[1]->emailStatus;
        $contactObject->emails = [ $email1, $email2 ];

        $phone1 = new stdClass();
        $phone1->id = $contact->phones[0]->id;
        $phone1->tag = $contact->phones[0]->tag;
        $phone1->phone = $contact->phones[0]->phone;
        $phone1->normalizedPhone = $contact->phones[0]->normalizedPhone;
        $phone2 = new stdClass();
        $phone2->id = $contact->phones[1]->id;
        $phone2->tag = $contact->phones[1]->tag;
        $phone2->phone = $contact->phones[1]->phone;
        $phone2->normalizedPhone = $contact->phones[1]->normalizedPhone;
        $contactObject->phones = [ $phone1, $phone2 ];

        $address1 = new stdClass();
        $address1->id = $contact->addresses[0]->id;
        $address1->tag = $contact->addresses[0]->tag;
        $address1->address = $contact->addresses[0]->address;
        $address1->neighborhood = $contact->addresses[0]->neighborhood;
        $address1->city = $contact->addresses[0]->city;
        $address1->region = $contact->addresses[0]->region;
        $address1->country = $contact->addresses[0]->country;
        $address1->postalCode = $contact->addresses[0]->postalCode;
        $address2 = new stdClass();
        $address2->id = $contact->addresses[1]->id;
        $address2->tag = $contact->addresses[1]->tag;
        $address2->address = $contact->addresses[1]->address;
        $address2->neighborhood = $contact->addresses[1]->neighborhood;
        $address2->city = $contact->addresses[1]->city;
        $address2->region = $contact->addresses[1]->region;
        $address2->country = $contact->addresses[1]->country;
        $address2->postalCode = $contact->addresses[1]->postalCode;
        $contactObject->addresses = [ $address1, $address2 ];

        $url1 = new stdClass();
        $url1->id = $contact->urls[0]->id;
        $url1->tag = $contact->urls[0]->tag;
        $url1->url= $contact->urls[0]->url;
        $url2 = new stdClass();
        $url2->id = $contact->urls[1]->id;
        $url2->tag = $contact->urls[1]->tag;
        $url2->url= $contact->urls[1]->url;
        $contactObject->urls = [ $url1, $url2 ];

        $date1 = new stdClass();
        $date1->id = $contact->dates[0]->id;
        $date1->tag = $contact->dates[0]->tag;
        $date1->date = $contact->dates[0]->date;
        $date2 = new stdClass();
        $date2->id = $contact->dates[1]->id;
        $date2->tag = $contact->dates[1]->tag;
        $date2->date = $contact->dates[1]->date;
        $contactObject->dates = [ $date1, $date2 ];

        $link1 = new stdClass();
        $link1->href = $contact->links[0]->href;
        $link1->rel = $contact->links[0]->rel;
        $link2 = new stdClass();
        $link2->href = $contact->links[1]->href;
        $link2->rel = $contact->links[1]->rel;
        $contactObject->links = [ $link1, $link2 ];

        $contactObject->createdAt = $contact->createdAt;
        $contactObject->modifiedAt = $contact->modifiedAt;

        return $contactObject;
    }
}