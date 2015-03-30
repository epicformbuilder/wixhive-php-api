<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 1:29 PM
 */
namespace epicformbuilder\WixHiveApi\Commands\Contact;

use epicformbuilder\Wix\ActivityType;
use epicformbuilder\Wix\Scope;
use epicformbuilder\WixHiveApi\Commands\Command;
use epicformbuilder\WixHiveApi\ResponseProcessors\PagingActivitiesResult;
use epicformbuilder\WixHiveApi\ResponseProcessors\Processor;
use epicformbuilder\WixHiveApi\Signature;

class GetContactActivities extends Command
{
    /** @var  string */
    protected $command = "/contacts/{contactId}/activities";

    /** @var string */
    protected $httpMethod = "GET";

    /**
     * @param string    $contactId
     * @param array     $activityTypes
     * @param \DateTime $until
     * @param \DateTime $from
     * @param string    $cursor
     * @param string    $pageSize
     * @param string    $scope - use Scope class constants
     */
    public function __construct($contactId, array $activityTypes, $cursor, \DateTime $from=null, \DateTime $until=null, $pageSize="25", $scope=Scope::SITE)
    {
        $this->command = str_replace(['{contactId}'], [$contactId], $this->command);

        foreach($activityTypes as $key => $type)
            if (!ActivityType::isTypeAllowed($type)) unset($activityTypes[$key]);

        $this->getParams = [
            'activityTypes' => implode(',', $activityTypes),
            'scope' => Scope::isScopeAllowed($scope) ? $scope : Scope::SITE,
            'cursor' => $cursor,
            'pageSize' => $pageSize,
        ];

        if ($cursor == null) {
            if ($until !== null) $this->getParams['until'] = $until->format(Signature::TIME_FORMAT);
            if ($from !== null) $this->getParams['from'] = $from->format(Signature::TIME_FORMAT);
        }
    }

    /**
     * @return Processor|PagingActivitiesResult
     */
    public function getResponseProcessor()
    {
        return new PagingActivitiesResult();
    }
}