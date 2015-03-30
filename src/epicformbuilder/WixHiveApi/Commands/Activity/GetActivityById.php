<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/25/15
 * Time: 9:33 PM
 */
namespace epicformbuilder\WixHiveApi\Commands\Activity;

use epicformbuilder\WixHiveApi\Commands\Command;
use epicformbuilder\WixHiveApi\ResponseProcessors\Activity;

class GetActivityById extends Command
{
    /** @var  string */
    protected $command = "/activities";

    /** @var string */
    protected $httpMethod = "GET";

    /**
     * @param string $id
     */
    public function __construct($id){
        $this->command.="/$id";
    }

    /**
     * @return Activity
     */
    public function getResponseProcessor()
    {
        return new Activity();

    }

}