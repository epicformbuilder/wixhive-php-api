<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 11/18/15
 * Time: 9:05 PM
 */
namespace epicformbuilder\Wix\Models;

use epicformbuilder\WixHiveApi\Signature;

/**
 * Class CreateActivity
 *
 * @package epicformbuilder\Wix\Models
 */
class CreateActivity extends Model{

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

    /**
     * @param \DateTime       $createdAt
     * @param string          $activityType
     * @param null            $activityLocationUrl
     * @param ActivityDetails $activityDetails
     * @param \stdClass       $activityInfo
     */
    public function __construct(\DateTime $createdAt=null, $activityType=null, $activityLocationUrl=null, ActivityDetails $activityDetails = null, \stdClass $activityInfo = null)
    {
        $this->createdAt = $createdAt->format(Signature::TIME_FORMAT);
        $this->activityType = $activityType;
        $this->activityLocationUrl = $activityLocationUrl;
        $this->activityDetails = $activityDetails;
        $this->activityInfo = $activityInfo;
    }

}