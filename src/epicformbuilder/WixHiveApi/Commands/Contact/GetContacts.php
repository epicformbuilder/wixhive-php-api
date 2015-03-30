<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/20/15
 * Time: 11:58 PM
 */
namespace epicformbuilder\WixHiveApi\Commands\Contact;

use epicformbuilder\WixHiveApi\Commands\Command;
use epicformbuilder\WixHiveApi\ResponseProcessors\PagingContactsResult;

class GetContacts extends Command
{

    /** @var  string */
    protected $command = "/contacts";

    /** @var string */
    protected $httpMethod = "GET";

    /**
     * @param string $tag
     * @param string $cursor
     * @param string $pageSize
     */
    public function __construct($tag, $cursor, $pageSize){
        $this->getParams = ["tag" => $tag, "cursor" => $cursor, "pageSize" => $pageSize];
    }


    /**
     * @return PagingContactsResult
     */
    public function getResponseProcessor()
    {
        return new PagingContactsResult();

    }
}