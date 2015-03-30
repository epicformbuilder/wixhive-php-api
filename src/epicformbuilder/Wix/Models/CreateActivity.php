<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/21/15
 * Time: 12:12 AM
 */
namespace epicformbuilder\Wix\Models;

use epicformbuilder\WixHiveApi\Signature;

class CreateActivity extends Model
{
    /** @var string */
    public $createdAt;

    /** @var  string */
    public $activityType;

    /** @var  string, the URL where the activity was performed */
    public $activityLocationUrl;

    /** @var ActivityDetails  */
    public $activityDetails;

    /** @var \stdClass  */
    public $activityInfo;

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
    public function __construct(\DateTime $createdAt, $activityType="", $activityLocationUrl=null, ActivityDetails $activityDetails = null, \stdClass $activityInfo = null, Contact $contactUpdate = null)
    {
        $this->createdAt = $createdAt->format(Signature::TIME_FORMAT);
        $this->activityType = $activityType;
        $this->activityLocationUrl = $activityLocationUrl;
        $this->activityDetails = $activityDetails;
        $this->activityInfo = $activityInfo;
        $this->contactUpdate = $contactUpdate;

    }
}