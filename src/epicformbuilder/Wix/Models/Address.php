<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/18/15
 * Time: 9:21 PM
 */
namespace epicformbuilder\Wix\Models;

class Address extends Model
{
    /** @var  int - The id of this information within the Contact, */
    public $id;

    /** @var  string - The context tag associated with this address, */
    public $tag;

    /** @var  string - The contact's street address, */
    public $address;

    /** @var  string - The contact's street neighborhood, */
    public $neighborhood;

    /** @var  string - The contact's city, */
    public $city;

    /** @var  string - The contact's region. An example of this would be a state in the US, or a province in Canada, */
    public $region;

    /** @var  string - The contact's country */
    public $country;

    /** @var  string - The contact's postal code */
    public $postalCode;

    /**
     * @param string $id
     * @param string $tag
     * @param string $address
     * @param string $neighborhood
     * @param string $city
     * @param string $region
     * @param string $country
     * @param string $postalCode
     */
    public function __construct($id=null, $tag=null, $address=null, $neighborhood=null, $city=null, $region=null, $country=null, $postalCode=null)
    {
        $this->id = $id;
        $this->tag = $tag;
        $this->address = $address;
        $this->neighborhood = $neighborhood;
        $this->city = $city;
        $this->region = $region;
        $this->country = $country;
        $this->postalCode = $postalCode;
    }

}