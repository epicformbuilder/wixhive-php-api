<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/20/15
 * Time: 4:55 PM
 */
namespace epicformbuilder\WixHiveApi\Commands\Contact;

use epicformbuilder\WixHiveApi\Commands\Command;
use epicformbuilder\WixHiveApi\ResponseProcessors\ContactResult;
use epicformbuilder\Wix\Models\CreateContact as CreateContactModel;

class CreateContact extends Command
{
    /** @var  string */
    protected $command = "/contacts";

    /** @var string */
    protected $httpMethod = "POST";

    public function __construct(CreateContactModel $createContact){
        $this->requestBodyObject = $createContact;
    }

    /**
     * @return ContactResult
     */
    public function getResponseProcessor()
    {
        return new ContactResult();
    }
}