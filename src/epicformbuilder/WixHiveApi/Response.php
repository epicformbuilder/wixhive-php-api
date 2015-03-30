<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/18/15
 * Time: 11:04 PM
 */
namespace epicformbuilder\WixHiveApi;

class Response
{
    /** @var  \stdClass */
    private $responseData;

    /**
     * @param \stdClass $responseData
     */
    public function __construct(\stdClass $responseData)
    {
        $this->responseData = $responseData;
    }

    /**
     * @return \stdClass
     */
    public function getResponseData()
    {
        return $this->responseData;
    }
}