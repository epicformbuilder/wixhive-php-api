<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 12:03 PM
 */
namespace epicformbuilder\WixHiveApi\Commands\Contact;

use epicformbuilder\Wix\Models\Address;
use epicformbuilder\Wix\Models\ContactUrl;
use epicformbuilder\WixHiveApi\Commands\Command;
use epicformbuilder\WixHiveApi\ResponseProcessors\Contact;
use epicformbuilder\WixHiveApi\ResponseProcessors\Processor;
use epicformbuilder\WixHiveApi\Signature;

class UpdateUrlForContact extends Command
{
    /** @var  string */
    protected $command = "/contacts/{contact_id}/url/{urlId}";

    /** @var string */
    protected $httpMethod = "PUT";

    /**
     * @param string      $contactId
     * @param string      $urlId
     * @param ContactUrl  $url
     * @param \DateTime   $modifiedAt
     */
    public function __construct($contactId, $urlId, ContactUrl $url, \DateTime $modifiedAt)
    {
        $this->command = str_replace(['{contact_id}', '{urlId}'], [$contactId, $urlId], $this->command);
        $this->getParams['modifiedAt'] = $modifiedAt->format(Signature::TIME_FORMAT);
        $this->requestBodyObject = $url;
    }

    /**
     * @return Processor|Contact
     */
    public function getResponseProcessor()
    {
        return new Contact();
    }
}