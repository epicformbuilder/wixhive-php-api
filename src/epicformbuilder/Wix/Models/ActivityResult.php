<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/21/15
 * Time: 12:10 AM
 */
namespace epicformbuilder\Wix\Models;

class ActivityResult extends Model
{
    /** @var  string */
    public $activityId;

    /** @var  string */
    public $contactId;

    /**
     * @param string $activityId
     * @param string $contactId
     */
    public function __construct($activityId, $contactId)
    {
        $this->activityId = $activityId;
        $this->contactId = $contactId;
    }

}