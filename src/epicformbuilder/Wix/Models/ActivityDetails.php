<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/21/15
 * Time: 12:14 AM
 */
namespace epicformbuilder\Wix\Models;

class ActivityDetails extends Model
{
    /** @var string - A url linking to more specific contextual information about the activity for use in the Dashboard, */
    public $additionalInfoUrl;

    /** @var string - A short description about the activity for use in the Dashboard */
    public $summary;

    /**
     * @param string $additionalInfoUrl
     * @param string $summary
     */
    public function __construct($additionalInfoUrl = "", $summary = "")
    {
        $this->additionalInfoUrl = $additionalInfoUrl;
        $this->summary = $summary;
    }

}
