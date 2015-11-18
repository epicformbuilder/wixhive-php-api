<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 11/18/15
 * Time: 10:05 PM
 */
namespace epicformbuilder\WixHiveApi\Commands\Contact;

use epicformbuilder\WixHiveApi\Commands\Command;
use epicformbuilder\WixHiveApi\ResponseProcessors\ContactResultNew;
use epicformbuilder\Wix\Models\CreateContact as CreateContactModel;

class CreateContactNew extends Command
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
     * @return ContactResultNew
     */
    public function getResponseProcessor()
    {
        return new ContactResultNew();
    }
}