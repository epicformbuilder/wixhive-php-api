<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 3:58 PM
 */
namespace epicformbuilder\WixHiveApi\Commands\Insights;

use epicformbuilder\Wix\Scope;
use epicformbuilder\WixHiveApi\Commands\Command;
use epicformbuilder\WixHiveApi\ResponseProcessors\ActivitySummary;
use epicformbuilder\WixHiveApi\ResponseProcessors\Processor;
use epicformbuilder\WixHiveApi\Signature;

class GetContactActivitySummary extends Command
{
    /** @var  string */
    protected $command = "/insights/contacts/{contactId}/activities/summary";

    /** @var string */
    protected $httpMethod = "GET";

    /**
     * @param string $scope, use Scope constants
     */
    public function __construct($contactId, $scope=Scope::SITE, \DateTime $form, \DateTime $until)
    {
        $this->command = str_replace(['{contactId}'], [$contactId], $this->command);

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