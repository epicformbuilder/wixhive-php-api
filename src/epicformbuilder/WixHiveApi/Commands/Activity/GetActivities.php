<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/25/15
 * Time: 9:37 PM
 */
namespace epicformbuilder\WixHiveApi\Commands\Activity;

use epicformbuilder\Wix\ActivityType;
use epicformbuilder\Wix\Scope;
use epicformbuilder\WixHiveApi\Commands\Command;
use epicformbuilder\WixHiveApi\ResponseProcessors\PagingActivitiesResult;
use epicformbuilder\WixHiveApi\Signature;

class GetActivities extends Command{

    /** @var  string */
    protected $command = "/activities";

    /** @var string */
    protected $httpMethod = "GET";

    /**
     * @param array $activityTypes
     * @param \DateTime $until, The ending date for activities we want to return. This field is only relevant when a cursor is not present
     * @param \DateTime $from, The beginning date for activities we want to return. This field is only relevant when a cursor is not present
     * @param $scope, The scope of the results to return, either for the entire site or limited to the current application.
     * @param string $cursor, The semi-optional cursor into the desired data. This cursor will expire after 30 minutes, it should not be cached.
     * @param $pageSize, The number of results to return per page of data. Valid options are: 25, 50 and 100
     */
    public function __construct(array $activityTypes, \DateTime $until=null, \DateTime $from=null, $scope=Scope::SITE, $cursor=null, $pageSize="25")
    {
        foreach($activityTypes as $key => $type)
            if (!ActivityType::isTypeAllowed($type)) unset($activityTypes[$key]);


        $this->getParams = [
            'activityTypes' => implode(',', $activityTypes),
            'scope' => Scope::isScopeAllowed($scope) ? $scope : Scope::SITE,
            'cursor' => $cursor,
            'pageSize' => $pageSize,
        ];

        if ($cursor == null){
            if ($until !== null) $this->getParams['until'] = $until->format(Signature::TIME_FORMAT);
            if ($from !== null) $this->getParams['from'] = $from->format(Signature::TIME_FORMAT);
        }

    }

    /**
     * @return PagingActivitiesResult
     */
    public function getResponseProcessor()
    {
        return new PagingActivitiesResult();

    }

}