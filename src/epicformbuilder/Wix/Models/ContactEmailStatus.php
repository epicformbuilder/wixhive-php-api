<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 1:16 PM
 */
namespace epicformbuilder\Wix\Models;

class ContactEmailStatus extends Model
{
    /** @var  string */
    public $status;

    /**
     * @param string $status
     */
    public function __construct($status)
    {
        $this->status = $status;

    }

}