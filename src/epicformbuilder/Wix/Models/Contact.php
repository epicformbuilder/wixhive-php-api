<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/18/15
 * Time: 9:10 PM
 */
namespace epicformbuilder\Wix\Models;

use epicformbuilder\WixHiveApi\Signature;

class Contact extends Model
{
    /** @var  string */
    public $id;

    /** @var ContactName */
    public $name;

    /** @var  string */
    public $picture;

    /** @var  Company */
    public $company;

    /** @var array Accepted value type is ContactEmail */
    public $emails=[];

    /** @var array Accepted value type is ContactPhone */
    public $phones=[];

    /** @var array Accepted value type is Address */
    public $addresses=[];

    /** @var array Accepted value type is ContactUrl */
    public $urls=[];

    /** @var array Accepted value type is ImportantDate */
    public $dates=[];

    /** @var array Accepted value type is StateLink */
    public $links=[];

    /** @var  string */
    public $createdAt;

    /** @var  string */
    public $modifiedAt;

    /**
     * @param string    $id
     * @param ContactName $name
     * @param string    $picture
     * @param Company   $company
     * @param array     $emails
     * @param array     $phones
     * @param array     $addresses
     * @param array     $urls
     * @param array     $dates
     * @param array     $links
     * @param \DateTime $createdAt
     * @param \DateTime $modifiedAt
     */
    public function __construct($id="", ContactName $name, $picture="", Company $company, array $emails = null, array $phones = null, array $addresses = null, array $urls = null, array $dates= null, array $links = null, \DateTime $createdAt = null,\DateTime $modifiedAt = null )
    {
        $this->id = $id;
        $this->name = $name;
        $this->picture = $picture;
        $this->company = $company;
        $this->emails = $emails;
        $this->phones = $phones;
        $this->addresses = $addresses;
        $this->urls = $urls;
        $this->dates = $dates;
        $this->links = $links;
        $this->createdAt = $createdAt->format(Signature::TIME_FORMAT);
        $this->modifiedAt  = $modifiedAt->format(Signature::TIME_FORMAT);
    }

}