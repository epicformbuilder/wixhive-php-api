<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/21/15
 * Time: 12:18 AM
 */
namespace epicformbuilder\WixHiveApi\Commands\Activity;

use epicformbuilder\WixHiveApi\Commands\Command;
use epicformbuilder\WixHiveApi\ResponseProcessors\ActivityResult;

class CreateActivity extends Command
{
    /** @var  string */
    protected $command = "/activities";

    /** @var string */
    protected $httpMethod = "POST";

    /**
     * @param \epicformbuilder\Wix\Models\CreateActivity $createActivity
     */
    public function __construct( \epicformbuilder\Wix\Models\CreateActivity $createActivity)
    {
        $this->requestBodyObject = $createActivity;
    }

    /**
     * @return ActivityResult
     */
    public function getResponseProcessor()
    {
        return new ActivityResult();

    }

}