<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 12:03 PM
 */
namespace epicformbuilder\WixHiveApi\Commands\Contact;

use epicformbuilder\Wix\Models\ImportantDate;
use epicformbuilder\WixHiveApi\Commands\Command;
use epicformbuilder\WixHiveApi\ResponseProcessors\Contact;
use epicformbuilder\WixHiveApi\ResponseProcessors\Processor;
use epicformbuilder\WixHiveApi\Signature;

class UpdateDateForContact extends Command
{
    /** @var  string */
    protected $command = "/contacts/{contact_id}/date/{date_id}";

    /** @var string */
    protected $httpMethod = "PUT";

    /**
     * @param string    $contactId
     * @param string    $dateId
     * @param ImportantDate   $date
     * @param \DateTime $modifiedAt
     */
    public function __construct($contactId, $dateId, ImportantDate $date, \DateTime $modifiedAt)
    {
        $this->command = str_replace(['{contact_id}', '{date_id}'], [$contactId, $dateId], $this->command);
        $this->getParams['modifiedAt'] = $modifiedAt->format(Signature::TIME_FORMAT);
        $this->requestBodyObject = $date;
    }

    /**
     * @return Processor|Contact
     */
    public function getResponseProcessor()
    {
        return new Contact();
    }
}