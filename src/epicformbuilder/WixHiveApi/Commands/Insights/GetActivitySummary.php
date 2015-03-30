<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 3:21 PM
 */
namespace epicformbuilder\WixHiveApi\Commands\Insights;

use epicformbuilder\Wix\Scope;
use epicformbuilder\WixHiveApi\Commands\Command;
use epicformbuilder\WixHiveApi\ResponseProcessors\ActivitySummary;
use epicformbuilder\WixHiveApi\ResponseProcessors\Processor;
use epicformbuilder\WixHiveApi\Signature;

class GetActivitySummary extends Command
{
    /** @var  string */
    protected $command = "/insights/activities/summary";

    /** @var string */
    protected $httpMethod = "GET";

    /**
     * @param string    $scope, use Scope constants
     * @param \DateTime $form
     * @param \DateTime $until
     */
    public function __construct($scope=Scope::SITE, \DateTime $form, \DateTime $until)
    {
        $this->getParams['scope'] = $scope;
        $this->getParams['form'] = $form->format(Signature::TIME_FORMAT);
        $this->getParams['until'] = $until->format(Signature::TIME_FORMAT);
    }

    /**
     * @return Processor|ActivitySummary
     */
    public function getResponseProcessor()
    {
        return new ActivitySummary();
    }
}