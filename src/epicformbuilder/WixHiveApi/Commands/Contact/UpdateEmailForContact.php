<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 12:03 PM
 */
namespace epicformbuilder\WixHiveApi\Commands\Contact;

use epicformbuilder\Wix\Models\Address;
use epicformbuilder\Wix\Models\ContactEmail;
use epicformbuilder\WixHiveApi\Commands\Command;
use epicformbuilder\WixHiveApi\ResponseProcessors\Contact;
use epicformbuilder\WixHiveApi\ResponseProcessors\Processor;
use epicformbuilder\WixHiveApi\Signature;

class UpdateEmailForContact extends Command
{
    /** @var  string */
    protected $command = "/contacts/{contact_id}/email/{emailId}";

    /** @var string */
    protected $httpMethod = "PUT";

    /**
     * @param string       $contactId
     * @param string       $emailId
     * @param ContactEmail $email
     * @param \DateTime    $modifiedAt
     */
    public function __construct($contactId, $emailId, ContactEmail $email, \DateTime $modifiedAt)
    {
        $this->command = str_replace(['{contact_id}', '{emailId}'], [$contactId, $emailId], $this->command);
        $this->getParams['modifiedAt'] = $modifiedAt->format(Signature::TIME_FORMAT);
        $this->requestBodyObject = $email;
    }

    /**
     * @return Processor|Contact
     */
    public function getResponseProcessor()
    {
        return new Contact();
    }
}