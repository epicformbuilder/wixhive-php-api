<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 1:51 PM
 */
namespace epicformbuilder\WixHiveApi\Commands\Contact;

use epicformbuilder\Wix\Models\Activity;
use epicformbuilder\WixHiveApi\Commands\Command;
use epicformbuilder\WixHiveApi\ResponseProcessors\ActivityResult;
use epicformbuilder\WixHiveApi\ResponseProcessors\Processor;

class AddContactActivity extends Command
{
    /** @var  string */
    protected $command = "/contacts/{contactId}/activities";

    /** @var string */
    protected $httpMethod = "POST";

    /**
     * @param string   $contactId
     * @param Activity $activity
     **/
    public function __construct($contactId, Activity $activity)
    {
        $this->command = str_replace(['{contactId}'], [$contactId,], $this->command);
        $this->requestBodyObject = $activity;
    }

    /**
     * @return Processor|ActivityResult
     */
    public function getResponseProcessor()
    {
        return new ActivityResult();
    }
}