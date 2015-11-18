<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 11/18/15
 * Time: 8:35 PM
 */
namespace epicformbuilder\WixHiveApi\Commands\Contact;

use epicformbuilder\WixHiveApi\ResponseProcessors\ActivityResult;
use epicformbuilder\Wix\Models\CreateActivity;
use epicformbuilder\WixHiveApi\Commands\Command;

class CreateContactActivity extends Command
{
    /** @var  string */
    protected $command = "/contacts/{contactId}/activities";

    /** @var string */
    protected $httpMethod = "POST";

    public function __construct($contactId, CreateActivity $createActivity){
        $this->command = str_replace(['{contactId}'], [$contactId], $this->command);
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
