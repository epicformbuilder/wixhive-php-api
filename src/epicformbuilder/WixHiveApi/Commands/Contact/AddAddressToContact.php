<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 11:15 AM
 */
namespace epicformbuilder\WixHiveApi\Commands\Contact;

use epicformbuilder\Wix\Models\Address;
use epicformbuilder\WixHiveApi\Commands\Command;
use epicformbuilder\WixHiveApi\ResponseProcessors\Processor;
use epicformbuilder\WixHiveApi\Signature;
use epicformbuilder\WixHiveApi\ResponseProcessors\Contact;


class AddAddressToContact extends Command
{
    /** @var  string */
    protected $command = "/contacts";

    /** @var string */
    protected $httpMethod = "POST";

    /**
     * @param string    $contactId
     * @param Address   $address
     * @param \DateTime $modifiedAt
     */
    public function __construct($contactId, Address $address, \DateTime $modifiedAt)
    {
        $this->command .= "/$contactId";
        $this->getParams['modifiedAt'] = $modifiedAt->format(Signature::TIME_FORMAT);
        $this->requestBodyObject = $address;
    }

    /**
     * @return Processor|Contact
     */
    public function getResponseProcessor()
    {
        return new Contact();
    }
}