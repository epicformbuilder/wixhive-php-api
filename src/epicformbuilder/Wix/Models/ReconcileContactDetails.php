<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 11/18/15
 * Time: 10:11 PM
 */
namespace epicformbuilder\Wix\Models;

class ReconcileContactDetails extends Model
{
    /** @var  array */
    public $rejectedData;

    /** @var  array */
    public $existingData;

    /** @var  ReconcileContactDetailsNote */
    public $note;

    /** @var  boolean */
    public $isNew;

    /**
     * @param array                       $rejectedData
     * @param array                       $existingData
     * @param ReconcileContactDetailsNote $note
     * @param boolean                     $isNew
     */
    public function __construct(array $rejectedData, array $existingData, ReconcileContactDetailsNote $note, $isNew)
    {
        $this->rejectedData = $rejectedData;
        $this->existingData = $existingData;
        $this->note = $note;
        $this->isNew = $isNew;
    }
}