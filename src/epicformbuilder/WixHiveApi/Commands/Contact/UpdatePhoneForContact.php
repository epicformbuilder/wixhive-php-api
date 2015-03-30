<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 12:03 PM
 */
namespace epicformbuilder\WixHiveApi\Commands\Contact;

use epicformbuilder\Wix\Models\ContactPhone;
use epicformbuilder\WixHiveApi\Commands\Command;
use epicformbuilder\WixHiveApi\ResponseProcessors\Contact;
use epicformbuilder\WixHiveApi\ResponseProcessors\Processor;
use epicformbuilder\WixHiveApi\Signature;

class UpdatePhoneForContact extends Command
{
    /** @var  string */
    protected $command = "/contacts/{contactId}/phone/{phoneId}";

    /** @var string */
    protected $httpMethod = "PUT";

    /**
     * @param string    $contactId
     * @param string    $phoneId
     * @param ContactPhone   $phone
     * @param \DateTime $modifiedAt
     */
    public function __construct($contactId, $phoneId, ContactPhone $phone, \DateTime $modifiedAt)
    {
        $this->command = str_replace(['{contactId}', '{phoneId}'], [$contactId, $phoneId], $this->command);
        $this->getParams['modifiedAt'] = $modifiedAt->format(Signature::TIME_FORMAT);
        $this->requestBodyObject = $phone;
    }

    /**
     * @return Processor|Contact
     */
    public function getResponseProcessor()
    {
        return new Contact();
    }
}