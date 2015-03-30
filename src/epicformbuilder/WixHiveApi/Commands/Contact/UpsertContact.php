<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/26/15
 * Time: 3:29 PM
 */
namespace epicformbuilder\WixHiveApi\Commands\Contact;

use epicformbuilder\WixHiveApi\Commands\Command;
use epicformbuilder\Wix\Models\UpsertContact as UpsertContactModel;
use epicformbuilder\WixHiveApi\ResponseProcessors\ContactResult;

class UpsertContact extends Command
{

    /** @var  string */
    protected $command = "/contacts";

    /** @var string */
    protected $httpMethod = "PUT";

    /**
     * @param UpsertContactModel $upsertContact
     */
    public function __construct(UpsertContactModel $upsertContact){
        $this->requestBodyObject = $upsertContact;
    }

    /**
     * @return ContactResult
     */
    public function getResponseProcessor()
    {
        return new ContactResult();
    }

}