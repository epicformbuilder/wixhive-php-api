<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/20/15
 * Time: 4:58 PM
 */
namespace epicformbuilder\WixHiveApi\Commands;

use epicformbuilder\WixHiveApi\ResponseProcessors\Processor;

abstract class Command{

    const WIXHIVE_HTTP_SCHEME = "https";
    const WIXHIVE_HOST = "openapi.wix.com";
    const WIXHIVE_VERSION = "v1";

    /** @var  string */
    protected $command;

    /** @var  string */
    protected $httpMethod;

    /** @var  array */
    protected $httpHeaders = [];

    /** @var  mixed */
    protected $requestBodyObject;

    /** @var array  */
    protected $getParams=[];

    /**
     * @return string
     */
    public function getEndpointUrl(array $getParams = []){
        $url = self::WIXHIVE_HTTP_SCHEME .'://'.self::WIXHIVE_HOST.'/'.self::WIXHIVE_VERSION . $this->command;

        $getParams = $this->getParams + $getParams;

        if (!empty($getParams)){
            $url .= "?".http_build_query($getParams);
        }

        return $url;
    }

    /**
     * @return string
     */
    public function getHttpMethod(){
        return $this->httpMethod;

    }

    /**
     * @return array
     */
    public function getHttpHeaders(){
        return $this->httpHeaders;
    }

    /**
     * @return string
     */
    public function getBody(){
        return $this->requestBodyObject ? json_encode($this->requestBodyObject) : "";
    }

    /**
     * @return string
     */
    public function getCommand(){
        return $this->command;
    }

    /**
     * @return Processor
     */
    abstract public function getResponseProcessor();
}