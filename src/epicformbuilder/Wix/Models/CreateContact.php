<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/18/15
 * Time: 9:36 PM
 */
namespace epicformbuilder\Wix\Models;

class CreateContact extends Model
{
    /** @var ContactName Information about the contact's name */
    public $name;

    /** @var  string A URL to the contact's photo */
    public $picture;

    /** @var  Company  Information about the contact's company and role*/
    public $company;

    /** @var array - Accepted value type is ContactEmail */
    public $emails=[];

    /** @var array - Accepted value type is ContactPhone */
    public $phones=[];

    /** @var array - Accepted value type is Address */
    public $addresses=[];

    /** @var array - Accepted value type is ContactUrl */
    public $urls;

    /** @var array - Accepted value type is ImportantDate */
    public $dates;

    /**
     * @param ContactName  $name
     * @param string  $picture
     * @param Company $company
     * @param array   $emails
     * @param array   $phones
     * @param array   $addresses
     * @param array   $urls
     * @param array   $dates
     */
    public function __construct(ContactName $name=null , $picture=null, Company $company=null, array $emails=null, array $phones=null, array $addresses=null, array $urls=null, array $dates=null)
    {
        $this->name = $name;
        $this->picture = $picture;
        $this->company = $company;
        $this->emails = $emails;
        $this->phones = $phones;
        $this->addresses = $addresses;
        $this->urls = $urls;
        $this->dates = $dates;
    }
}