<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 12:03 PM
 */
namespace epicformbuilder\WixHiveApi\Commands\Contact;

use epicformbuilder\Wix\Models\Company;
use epicformbuilder\WixHiveApi\Commands\Command;
use epicformbuilder\WixHiveApi\ResponseProcessors\Contact;
use epicformbuilder\WixHiveApi\ResponseProcessors\Processor;
use epicformbuilder\WixHiveApi\Signature;

class UpdateCompanyForContact extends Command
{
    /** @var  string */
    protected $command = "/contacts";

    /** @var string */
    protected $httpMethod = "PUT";

    /**
     * @param string    $contactId
     * @param Company   $company
     * @param \DateTime $modifiedAt
     */
    public function __construct($contactId, Company $company, \DateTime $modifiedAt)
    {
        $this->command .= "/$contactId";
        $this->getParams['modifiedAt'] = $modifiedAt->format(Signature::TIME_FORMAT);
        $this->requestBodyObject = $company;
    }

    /**
     * @return Processor|Contact
     */
    public function getResponseProcessor()
    {
        return new Contact();
    }
}