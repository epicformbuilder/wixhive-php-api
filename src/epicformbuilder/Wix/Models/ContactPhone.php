<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/18/15
 * Time: 9:19 PM
 */
namespace epicformbuilder\Wix\Models;

class ContactPhone extends Model
{
    /** @var string - The id of this phone information within the Contact, */
    public $id;

    /** @var string - The context tag associated with this phone number, */
    public $tag;

    /** @var string - The contact's raw phone number, */
    public $phone;

    /** @var string - The contact's normalized phone number */
    public $normalizedPhone;

    /**
     * @param string|null $id
     * @param string $tag
     * @param string $phone
     * @param string $normalizedPhone
     */
    public function __construct($id=null, $tag="", $phone="", $normalizedPhone="")
    {
        $this->id = $id;
        $this->tag = $tag;
        $this->phone = $phone;
        $this->normalizedPhone = $normalizedPhone;
    }
}