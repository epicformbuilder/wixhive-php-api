<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/21/15
 * Time: 12:18 AM
 */
namespace epicformbuilder\WixHiveApi\Commands\Activity;

use epicformbuilder\Wix\Models\CreateActivityOld;
use epicformbuilder\WixHiveApi\Commands\Command;
use epicformbuilder\WixHiveApi\ResponseProcessors\ActivityResult;

/**
 * Class CreateActivityOld
 * @package epicformbuilder\WixHiveApi\Commands\Activity
 * @deprecated Wix can stop supporting the command any time. Please, use CreateContactActivity command instead
 */
class CreateActivity extends Command
{
    /** @var  string */
    protected $command = "/activities";

    /** @var string */
    protected $httpMethod = "POST";

    /**
     * @param CreateActivityOld $createActivity
     */
    public function __construct(CreateActivityOld $createActivity)
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