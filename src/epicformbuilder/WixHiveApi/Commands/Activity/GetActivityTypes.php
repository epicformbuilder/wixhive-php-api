<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/25/15
 * Time: 9:27 PM
 */
namespace epicformbuilder\WixHiveApi\Commands\Activity;

use epicformbuilder\WixHiveApi\Commands\Command;
use epicformbuilder\WixHiveApi\ResponseProcessors\ActivityTypes;

class GetActivityTypes extends Command
{
    /** @var  string */
    protected $command = "/activities/types";

    /** @var string */
    protected $httpMethod = "GET";

    public function __construct(){}

    /**
     * @return ActivityTypes
     */
    public function getResponseProcessor()
    {
        return new ActivityTypes();

    }

}