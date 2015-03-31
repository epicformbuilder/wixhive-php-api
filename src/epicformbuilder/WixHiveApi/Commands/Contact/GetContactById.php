<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/31/15
 * Time: 8:14 PM
 */
namespace epicformbuilder\WixHiveApi\Commands\Contact;

use epicformbuilder\WixHiveApi\Commands\Command;
use epicformbuilder\WixHiveApi\ResponseProcessors\Contact;

class GetContactById extends Command
{
    /** @var  string */
    protected $command = "/contacts/{contactId}";

    /** @var string */
    protected $httpMethod = "GET";

    /**
     * @param $contactId
     */
    public function __construct($contactId){
        $this->command = str_replace(['{contactId}'], [$contactId], $this->command);
    }

    /**
     * @return Contact
     */
    public function getResponseProcessor()
    {
        return new Contact();

    }
}