<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/20/15
 * Time: 11:53 PM
 */
namespace epicformbuilder\Wix\Models;

class ContactResult extends Model
{

    /** @var  string */
    public $contactId;

    /**
     * @param string $contactId
     */
    public function __construct($contactId)
    {
        $this->contactId = $contactId;

    }
}