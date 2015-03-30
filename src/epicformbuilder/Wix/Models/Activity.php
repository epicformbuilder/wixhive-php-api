<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/27/15
 * Time: 11:11 AM
 */
namespace epicformbuilder\Wix\Models;

use epicformbuilder\Wix\ActivityType;

class Activity extends Model
{
    /** @var  string */
    public $id;

    /** @var  \DateTime */
    public $createdAt;

    /** @var  string */
    public $activityType;

    /** @var  string  */
    public $activityLocationUrl;

    /** @var  ActivityDetails|null */
    public $activityDetails = null;

    /** @var  \stdClass */
    public $activityInfo;

    /**
     * @param string          $id
     * @param \DateTime       $createdAt
     * @param string          $activityType - use ActivityType constants
     * @param string          $activityLocationUrl
     * @param ActivityDetails $activityDetails
     * @param \stdClass       $activityInfo
     */
    public function __construct($id, \DateTime $createdAt, $activityType, \stdClass $activityInfo, $activityLocationUrl="", ActivityDetails $activityDetails=null)
    {
        $this->id = $id;
        $this->createdAt = $createdAt;
        $this->activityType = ActivityType::isTypeAllowed($activityType) ? $activityType : "" ;
        $this->activityLocationUrl = $activityLocationUrl;
        $this->activityDetails = $activityDetails;
        $this->activityInfo = $activityInfo;
    }
}

