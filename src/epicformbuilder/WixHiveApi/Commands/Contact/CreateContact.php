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

/**
 * Class CreateContact
 * @package epicformbuilder\WixHiveApi\Commands\Contact
 * @deprecated Wix will stop support the command any time. Please, start using CreateContactNew command instead ASAP
 */
class CreateContact extends Command
{
    /** @var  string */
    protected $command = "/contacts";

    /** @var string */
    protected $httpMethod = "POST";

    /**
     * @param CreateContactModel $createContact
     */
    public function __construct(CreateContactModel $createContact)
    {
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