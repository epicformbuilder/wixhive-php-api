<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 3:25 PM
 */
namespace epicformbuilder\Wix\Models;

class ActivitySummary extends Model
{
    /** @var  array, items - ActivityTypeSummary */
    public $activityTypes;

    /** @var  string */
    public $total;

    /** @var  \DateTime */
    public $from;

    /** @var  \DateTime */
    public $until;

    /**
     * @param array          $activityTypes
     * @param string         $total
     * @param \DateTime      $from
     * @param \DateTime|null $until
     */
    public function __construct(array $activityTypes, $total, \DateTime $from, \DateTime $until=null)
    {
        $this->activityTypes = $activityTypes;
        $this->total = $total;
        $this->from = $from;
        $this->until = $until;
    }

}