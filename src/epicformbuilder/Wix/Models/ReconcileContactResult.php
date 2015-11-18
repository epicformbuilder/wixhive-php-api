<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 11/18/15
 * Time: 10:08 PM
 */
namespace epicformbuilder\Wix\Models;

class ReconcileContactResult extends Model
{

    /** @var Contact  */
    public $contact;

    /** @var ReconcileContactDetails  */
    public $details;

    /**
     * @param Contact                 $contact
     * @param ReconcileContactDetails $details
     */
    public function __construct(Contact $contact, ReconcileContactDetails $details)
    {
        $this->contact = $contact;
        $this->details = $details;
    }
}
