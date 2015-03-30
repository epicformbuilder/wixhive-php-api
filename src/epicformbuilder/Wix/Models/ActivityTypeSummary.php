<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 3:29 PM
 */
namespace epicformbuilder\Wix\Models;

class ActivityTypeSummary extends Model
{
    /** @var  string, use ActivityType constants */
    public $activityType;

    /** @var  string */
    public $total;

    /** @var  \DateTime */
    public $from;

    /** @var  \DateTime */
    public $until;

    /**
     * @param string    $activityType
     * @param string          $total
     * @param \DateTime $from
     * @param \DateTime $until
     */
    public function __construct($activityType, $total, \DateTime $from, \DateTime $until=null)
    {
        $this->activityType = $activityType;
        $this->total = $total;
        $this->from = $from;
        $this->until = $until;
    }


}