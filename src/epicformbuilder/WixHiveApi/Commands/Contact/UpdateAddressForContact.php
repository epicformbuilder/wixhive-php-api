<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 12:03 PM
 */
namespace epicformbuilder\WixHiveApi\Commands\Contact;

use epicformbuilder\Wix\Models\Address;
use epicformbuilder\WixHiveApi\Commands\Command;
use epicformbuilder\WixHiveApi\ResponseProcessors\Contact;
use epicformbuilder\WixHiveApi\ResponseProcessors\Processor;
use epicformbuilder\WixHiveApi\Signature;

class UpdateAddressForContact extends Command
{
    /** @var  string */
    protected $command = "/contacts/{contact_id}/address/{address_id}";

    /** @var string */
    protected $httpMethod = "PUT";

    /**
     * @param string    $contactId
     * @param string    $addressId
     * @param Address   $address
     * @param \DateTime $modifiedAt
     */
    public function __construct($contactId, $addressId, Address $address, \DateTime $modifiedAt)
    {
        $this->command = str_replace(['{contact_id}', '{address_id}'], [$contactId, $addressId], $this->command);
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