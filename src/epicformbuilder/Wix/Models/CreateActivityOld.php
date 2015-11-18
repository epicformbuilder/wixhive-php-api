<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/21/15
 * Time: 12:12 AM
 */
namespace epicformbuilder\Wix\Models;

/**
 * Class CreateActivityOld
 * @package epicformbuilder\Wix\Models
 * @deprecated
 */
class CreateActivityOld extends CreateActivity
{
    /** @var  Contact */
    public $contactUpdate;

    /**
     * @param \DateTime       $createdAt
     * @param string          $activityType
     * @param null            $activityLocationUrl
     * @param ActivityDetails $activityDetails
     * @param \stdClass       $activityInfo
     * @param Contact         $contactUpdate
     */
    public function __construct(\DateTime $createdAt=null, $activityType=null, $activityLocationUrl=null, ActivityDetails $activityDetails = null, \stdClass $activityInfo = null, Contact $contactUpdate = null)
    {
        parent::__construct($createdAt, $activityType, $activityLocationUrl, $activityDetails, $activityInfo);
        $this->contactUpdate = $contactUpdate;
    }
}